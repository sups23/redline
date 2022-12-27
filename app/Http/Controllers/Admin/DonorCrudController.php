<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DonorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DonorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DonorCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Donor::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/donor');
        CRUD::setEntityNameStrings('donor', 'donors');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('blood_group');
        CRUD::column('contact');
        CRUD::column('address');
        CRUD::column('age');
        CRUD::column('gender');
        CRUD::column('donation_interval');
        CRUD::column('donation_count');
        CRUD::column('last_donation_at');
        CRUD::column('description');
        // CRUD::column('created_at');
        // CRUD::column('updated_at');

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
        CRUD::setValidation(DonorRequest::class);

        CRUD::field('name');
        CRUD::addfield([  
            'name'=> 'blood_type',
            'type'        => 'select_from_array',
            'options'     => ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'],
            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::field('contact');
        CRUD::field('address');
        CRUD::field('age');
        CRUD::addField([
            'name'=>'gender',
            'type'=>'select_from_array',
            'options'=>['male', 'female'],
            'allows_null'=>true,
        ]);
        CRUD::addField([
            'name'=>'donation_interval',
            'type'=>'select_from_array',
            'options'=>['3 months', '6 months', '1 year', 'irregular'],
            'allows_null'=>true,
        ]);
        CRUD::field('donation_count');
        CRUD::field('last_donation_at');
        CRUD::field('description');

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





