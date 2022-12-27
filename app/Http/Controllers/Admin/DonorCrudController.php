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
        $this->crud->setModel(\App\Models\Donor::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/donor');
        $this->crud->setEntityNameStrings('donor', 'donors');

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

        // daterange filter
        $this->crud->addFilter(
            [
                'type'  => 'date_range',
                'name'  => 'last_donation_at',
                'label' => 'Last donation'
            ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $dates = json_decode($value);
                $this->crud->addClause('where', 'last_donation_at', '>=', $dates->from);
                $this->crud->addClause('where', 'last_donation_at', '<=', $dates->to . ' 23:59:59');
            }
        );

        $this->crud->addFilter([ // select2 filter
            'name' => 'donation_interval',
            'type' => 'dropdown',
            'label' => 'Donation Interval'
        ], function () {
            return [
                '3 months' => '3 Months',
                '6 months' => '6 Months',
                '1 year' => '1 Year',
                'irregular' => 'Irregular'
            ];
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'donation_interval', $value);
        });

        $this->crud->addFilter(
            [
                'name'       => 'donation_count',
                'type'       => 'range',
                'label'      => 'Donation count',
                'label_from' => 'min value',
                'label_to'   => 'max value'
            ],
            false,
            function ($value) { // if the filter is active
                $range = json_decode($value);
                if ($range->from) {
                    $this->crud->addClause('where', 'donation_count', '>=', (float) $range->from);
                }
                if ($range->to) {
                    $this->crud->addClause('where', 'donation_count', '<=', (float) $range->to);
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
        $this->crud->column('name');
        $this->crud->column('blood_group')->searchLogic(false);
        $this->crud->column('contact');
        $this->crud->column('address');
        $this->crud->column('age')->searchLogic(false);
        $this->crud->column('gender')->searchLogic(false)->value(function($v) { return ucfirst($v->gender); });
        $this->crud->column('donation_interval')->searchLogic(false);
        $this->crud->column('donation_count')->searchLogic(false);
        $this->crud->column('last_donation_at')->searchLogic(false);
        $this->crud->column('description');
        // $this->crud->column('created_at');
        // $this->crud->column('updated_at');

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
        $this->crud->setValidation(DonorRequest::class);

        $this->crud->field('name');
        $this->crud->addfield([
            'name' => 'blood_type',
            'type'        => 'select_from_array',
            'options'     => ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'],
            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->field('contact');
        $this->crud->field('address');
        $this->crud->field('age');
        $this->crud->addField([
            'name' => 'gender',
            'type' => 'select_from_array',
            'options' => ['male', 'female'],
            'allows_null' => true,
        ]);
        $this->crud->addField([
            'name' => 'donation_interval',
            'type' => 'select_from_array',
            'options' => [
                '3 months' => '3 Months',
                '6 months' => '6 Months',
                '1 year' => '1 Year',
                'irregular' => 'Irregular'
            ],
            'allows_null' => true,
        ]);
        $this->crud->field('donation_count');
        $this->crud->field('last_donation_at');
        $this->crud->field('description');

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





