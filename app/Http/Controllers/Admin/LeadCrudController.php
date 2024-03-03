<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LeadRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Lead;
use App\Models\District;
use App\Models\Course;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Class LeadCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LeadCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Lead::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/lead');
        CRUD::setEntityNameStrings('lead', 'leads');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
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
        CRUD::setValidation(LeadRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
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
    
    public function store(Request $request)
    {
        $lead = New Lead();
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->city_id = $request->city_id;
        $lead->course_id = $request->course_id;
        $lead->college_id = $request->college_id;
        
        
        $city       = District::find($request->city_id);
        $course     = Course::find($request->course_id);
        
        if($request->college_id) {
            $college    = College::find($request->college_id)->name;
        }
        else {
            $college    = "College Choice";
        }
        
        
        if($lead->save()) {
            // Extract contact data from $request
            $contactData = [
                'properties' => [
                    'firstname' => explode(" ", $request->name)[0],
                    'lastname' => explode(" ", $request->name)[1],
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'course' => $course->short_name,
                    'city'  => $city->name,
                    'company'   => $college,
                    'hs_lead_status' => 'NEW'
                ],
            ];
        
            // Make the API request to HubSpot
            $response = Http::withHeaders([
                'Authorization' => 'Bearer pat-na1-5f59adcd-2bd2-4c36-9850-20155476bea8',
            ])->post('https://api.hubapi.com/crm/v3/objects/contacts', $contactData);
            
            if ($response->successful()) {
                // Contact created successfully
                // Handle any additional logic here
            } else {
            //   dd($response);
            }
            
            return redirect()->route("thank_you")->with("success");
        }
        else {
            return redirect()->route("thank_you")->with("failed");
        }
    }
}
