<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HospitalRequestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class HospitalRequestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HospitalRequestCrudController extends CrudController
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
        $this->crud->setModel(\App\Models\HospitalRequest::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hospital-request');
        $this->crud->setEntityNameStrings('hospital request', 'hospital requests');

        $this->crud->denyAccess('create');

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
            'name' => 'blood_group',
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
            $this->crud->addClause('whereIn', 'blood_group', json_decode($values));
        });

        $this->crud->addFilter([ // select2 filter
            'name' => 'gendere',
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

        $this->crud->addFilter(
            [
                'type'  => 'date_range',
                'name'  => 'blood_needed_on',
                'label' => 'Needed At'
            ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $dates = json_decode($value);
                $this->crud->addClause('where', 'blood_needed_on', '>=', $dates->from);
                $this->crud->addClause('where', 'blood_needed_on', '<=', $dates->to . ' 23:59:59');
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
        $this->crud->column('name');
        $this->crud->column('contact');
        $this->crud->column('age');
        $this->crud->column('gender')->searchLogic(false)->value(function ($v) {
            return ucfirst($v->gender);
        });
        $this->crud->column('unit');
        $this->crud->column('form_image')->type('image');
        $this->crud->column('blood_group');
        $this->crud->column('blood_needed_on');

        $this->crud->removeButton('update');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - $this->crud->column('price')->type('number');
         * - $this->crud->addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    public function setupShowOperation()
    {
        $this->setupListOperation();
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(HospitalRequestRequest::class);

        $this->crud->field('name');
        $this->crud->field('age');
        $this->crud->field('gender');
        $this->crud->field('form_image');
        $this->crud->field('blood_group');
        $this->crud->field('blood_needed_on');
        $this->crud->field('note');

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
        $this->crud->setupCreateOperation();
    }
}
