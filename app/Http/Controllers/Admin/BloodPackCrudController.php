<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BloodPackRequest;
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
        CRUD::setModel(\App\Models\BloodPack::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/blood-pack');
        CRUD::setEntityNameStrings('blood pack', 'blood packs');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('donor');
        CRUD::column('arrived_at');
        CRUD::column('expiry_at');
        CRUD::column('blood_type');
        CRUD::column('rbc_count')->label('RBC Count')->value(function($v) {
            return number_format($v->rbc_count/10, 3) . ' x 10^12L';
        });
        CRUD::column('wbc_count')->label('WBC Count')->value(function($v) {
            return number_format($v->wbc_count/10, 3) . ' x 10^9L';
        });
        CRUD::column('haemo_level')->label('Hemoglobin Level')->value(function($v) {
            return number_format($v->haemo_level/10, 3) . ' g/L';
        });

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
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
        CRUD::setValidation(BloodPackRequest::class);

        CRUD::addField([  // Select
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
        ],);

        CRUD::field('arrived_at');
        CRUD::field('expiry_at');
        CRUD::addField([   // select_from_array
            'name'        => 'blood_type',
            'label'       => "Blood Type",
            'type'        => 'select_from_array',
            'options'     => [
                'WB', 'PRBC', 'SWRBC', 'SDPS', 'FFP', 'PC', 'SDP', 'PRB', 'CR', 'OTH'
            ],
            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ],);
        CRUD::field('rbc_count')->label('RBC Count');
        CRUD::field('wbc_count')->label('WBC Count');
        CRUD::field('haemo_level')->label('Hemoglobin Level');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
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
