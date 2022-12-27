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
            ];
        }, function ($values) { // if the filter is active
            $this->crud->addClause('whereIn', 'blood_type', json_decode($values));
        });

        $this->crud->addFilter(
            [
                'name'       => 'rbc_count',
                'type'       => 'range',
                'label'      => 'RBC Count (x10^12/L)',
                'label_from' => 'min value',
                'label_to'   => 'max value'
            ],
            false,
            function ($value) { // if the filter is active
                $range = json_decode($value);
                if ($range->from) {
                    $this->crud->addClause('where', 'rbc_count', '>=', (float) $range->from * 10);
                }
                if ($range->to) {
                    $this->crud->addClause('where', 'rbc_count', '<=', (float) $range->to * 10);
                }
            }
        );

        $this->crud->addFilter(
            [
                'name'       => 'wbc_count',
                'type'       => 'range',
                'label'      => 'WBC Count (x10^9/L)',
                'label_from' => 'min value',
                'label_to'   => 'max value'
            ],
            false,
            function ($value) { // if the filter is active
                $range = json_decode($value);
                if ($range->from) {
                    $this->crud->addClause('where', 'wbc_count', '>=', (float) $range->from * 10);
                }
                if ($range->to) {
                    $this->crud->addClause('where', 'wbc_count', '<=', (float) $range->to * 10);
                }
            }
        );

        $this->crud->addFilter(
            [
                'name'       => 'haemo_level',
                'type'       => 'range',
                'label'      => 'Hemoglobin Level (g/L)',
                'label_from' => 'min value',
                'label_to'   => 'max value'
            ],
            false,
            function ($value) { // if the filter is active
                $range = json_decode($value);
                if ($range->from) {
                    $this->crud->addClause('where', 'haemo_level', '>=', (float) $range->from * 10);
                }
                if ($range->to) {
                    $this->crud->addClause('where', 'haemo_level', '<=', (float) $range->to * 10);
                }
            }
        );
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->column('donor_id')->searchLogic(true);
        $this->crud->column('arrived_at')->searchLogic(false);
        $this->crud->column('expiry_at')->searchLogic(false);
        $this->crud->column('blood_type')->searchLogic(false);
        $this->crud->column('rbc_count')->label('RBC Count')->value(function ($v) {
            return number_format($v->rbc_count / 10, 1) . ' x 10^12/L';
        })->searchLogic(false);
        $this->crud->column('wbc_count')->label('WBC Count')->value(function ($v) {
            return number_format($v->wbc_count / 10, 1) . ' x 10^9/L';
        })->searchLogic(false);
        $this->crud->column('haemo_level')->label('Hemoglobin Level')->value(function ($v) {
            return number_format($v->haemo_level / 10, 1) . ' g/L';
        })->searchLogic(false);

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
