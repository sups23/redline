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
        CRUD::column('user_id');
        CRUD::column('arrived_at');
        CRUD::column('expiry_at');
        CRUD::column('blood_type');
        CRUD::column('rbc_count');
        CRUD::column('wbc_count');
        CRUD::column('haemo_level');
        CRUD::column('created_at');
        CRUD::column('updated_at');

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

        CRUD::field('user_id');
        CRUD::field('arrived_at');
        CRUD::field('expiry_at');
        CRUD::addField([
            'name'  => 'blood_type',
            'type'  => 'select_from_array',
            'options'=> [
                'WB'=>'Whole Blood', 
                'PRBC'=>'Packed Red Blood Cell', 
                'SWRBC'=>'Washed Red Cell', 
                'SDPS'=>'Single Donor Platelets', 
                'FFP'=>'Fresh Frozen Plasma', 
                'PC'=>'Platelet Concentrate',
                'SDP'=>'Single Donor Plasma', 
                'PRB'=>'Platelet Rich Blood', 
                'CR'=>'Cryoprecipitate', 
                'OTH'=>'Others'
            ],
            'allows_null'=>false,
            'default'=>'WB',
        ]);
        CRUD::field('rbc_count');
        CRUD::field('wbc_count');
        CRUD::field('haemo_level');

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
