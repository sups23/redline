<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Library\Widget;
use App\Http\Requests\BloodPackRequest;
use App\Models\Donor;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BloodPackCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BloodPackCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        $this->crud->setModel(\App\Models\BloodPack::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/blood-pack');
        $this->crud->setEntityNameStrings('blood pack', 'blood packs');

        $this->crud->addFilter([
            'name' => 'donor_id',
            'type' => 'select2',
            'label' => 'Donor',
            'model' => Donor::class,
            'attribute' => 'name',
        ], function() {
            return Donor::all()->pluck('name', 'id')->toArray();
        }, function($value) {
            $this->crud->addClause('where', 'donor_id', $value);
        });

        $this->crud->addFilter(
            [
                'type'  => 'date_range',
                'name'  => 'arrived_at',
                'label' => 'Arrival Date'
            ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $dates = json_decode($value);
                $this->crud->addClause('where', 'arrived_at', '>=', $dates->from);
                $this->crud->addClause('where', 'arrived_at', '<=', $dates->to . ' 23:59:59');
            }
        );

        $this->crud->addFilter(
            [
                'type'  => 'date_range',
                'name'  => 'expiry_at',
                'label' => 'Expiry Date'
            ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $dates = json_decode($value);
                $this->crud->addClause('where', 'expiry_at', '>=', $dates->from);
                $this->crud->addClause('where', 'expiry_at', '<=', $dates->to . ' 23:59:59');
            }
        );

        $this->crud->addFilter([ // select2 filter
            'name' => 'blood_type',
            'type' => 'select2_multiple',
            'label' => 'Type of Blood'
        ], function () {
            return [
                'A+' => 'A+',
                'B+' => 'B+',
                'O+' => 'O+',
                'AB+' => 'AB+',
                'A-' => 'A-',
                'B-' => 'B-',
                'O-' => 'O-',
                'AB-' => 'AB-'
            ];
        }, function ($values) { // if the filter is active
            $this->crud->addClause('whereIn', 'blood_type', json_decode($values));
        });
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->column('donor');
        $this->crud->column('arrived_at');
        $this->crud->column('expiry_at');
        $this->crud->column('blood_type');
        $this->crud->column('rbc_count')->label('RBC Count')->value(function ($v) {
            return number_format($v->rbc_count / 10, 3) . ' x 10^12L';
        });
        $this->crud->column('wbc_count')->label('WBC Count')->value(function ($v) {
            return number_format($v->wbc_count / 10, 3) . ' x 10^9L';
        });
        $this->crud->column('haemo_level')->label('Hemoglobin Level')->value(function ($v) {
            return number_format($v->haemo_level / 10, 3) . ' g/L';
        });

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - $this->crud->column('price')->type('number');
         * - $this->crud->addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(BloodPackRequest::class);

        $this->crud->addField([
            'label' => 'Search by donor name',
            'fake' => true,
            'type' => 'text',
            'name' => 'name',
            'attributes' => [
                'id' => 'searchField'
            ]
        ]);
        Widget::add()->type('script')->content('assets/js/search-users.js');

        $this->crud->addField([  // Select
            'label'     => "Donor",
            'type'      => 'select',
            'name'      => 'donor_id', // the db column for the foreign key

            // optional
            // 'entity' should point to the method that defines the relationship in your Model
            // defining entity will make Backpack guess 'model' and 'attribute'
            'entity'    => 'donor',

            // optional - manually specify the related model and attribute
            'model'     => "App\Models\Donor", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user

            'attributes' => [
                'id' => 'nameField'
            ]
        ],);

        $this->crud->field('arrived_at');
        $this->crud->field('expiry_at');
        $this->crud->addField([
            'name'  => 'blood_type',
            'type'  => 'select_from_array',
            'options' => [
                'WB' => 'Whole Blood',
                'PRBC' => 'Packed Red Blood Cell',
                'SWRBC' => 'Washed Red Cell',
                'SDPS' => 'Single Donor Platelets',
                'FFP' => 'Fresh Frozen Plasma',
                'PC' => 'Platelet Concentrate',
                'SDP' => 'Single Donor Plasma',
                'PRB' => 'Platelet Rich Blood',
                'CR' => 'Cryoprecipitate',
                'OTH' => 'Others'
            ],
            'allows_null' => false,
            'default' => 'WB',
        ]);

        $this->crud->field('rbc_count')->label('RBC Count');
        $this->crud->field('wbc_count')->label('WBC Count');
        $this->crud->field('haemo_level')->label('Hemoglobin Level');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - $this->crud->field('price')->type('number');
         * - $this->crud->addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
