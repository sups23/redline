<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ToBeDonorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ToBeDonorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ToBeDonorCrudController extends CrudController
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
        $this->crud->setModel(\App\Models\ToBeDonor::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/to-be-donor');
        $this->crud->setEntityNameStrings('to be donor', 'to be donors');

        $this->crud->addFilter([ // select2 filter
            'name' => 'bloodgroup',
            'type' => 'select2_multiple',
            'label' => 'Blood Group'
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
            $this->crud->addClause('whereIn', 'bloodgroup', json_decode($values));
        });

        $this->crud->addFilter(
            [
                'name'       => 'age',
                'type'       => 'range',
                'label'      => 'Age',
                'label_from' => 'min value',
                'label_to'   => 'max value'
            ],
            false,
            function ($value) { // if the filter is active
                $range = json_decode($value);
                if ($range->from) {
                    $this->crud->addClause('where', 'age', '>=', (float) $range->from);
                }
                if ($range->to) {
                    $this->crud->addClause('where', 'age', '<=', (float) $range->to);
                }
            }
        );

        $this->crud->addFilter([ // select2 filter
            'name' => 'gender',
            'type' => 'dropdown',
            'label' => 'Gender'
        ], function () {
            return [
                'male' => 'Male',
                'female' => 'Female'
            ];
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'gender', $value);
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

        $this->crud->column('name');
        $this->crud->column('address');
        $this->crud->column('contact');
        $this->crud->column('age')->searchLogic(false);
        $this->crud->column('gender')->searchLogic(false);
        $this->crud->column('bloodgroup')->searchLogic(false);
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
        $this->crud->setValidation(ToBeDonorRequest::class);



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
