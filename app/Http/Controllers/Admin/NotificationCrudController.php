<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NotificationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\College;
use App\Models\Course;
use App\Models\District;
use App\Models\Notification;

/**
 * Class NotificationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NotificationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Notification::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/notification');
        CRUD::setEntityNameStrings('notification', 'notifications');
    }
    
    public function show($id)
    {
        $college_menu = $this->get_colleges_menu();
        $notification = Notification::find($id);
        return view("pages.notification", ["notification" => $notification, "college_menu" => $college_menu]);
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        $this->crud->addColumn([
            'name'  => 'Title',
            'label' => 'Title',
            'type'  => 'text',
        ]);
        
        $this->crud->addColumn([
            'name'  => 'date',
            'label' => 'Date',
            'type'  => 'date',
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(NotificationRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([  
            'name'      => 'Title',
            'label'     => 'Title',
            'type'      => 'text'
        ]);
        
        
        CRUD::field([   // CKEditor
            'name'          => 'description',
            'label'         => 'Description',
            'type'          => 'ckeditor',
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);
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
    
    public function get_colleges_menu()
    {
        $courses        = [];
        $districts      = District::where("state_id", 1)->get();
        
        $parent_course  = Course::where("course_id", 0)->get();
        foreach($parent_course as $p_course) {
            $p_course->childs = Course::where("course_id", $p_course->id)->get();
            $p_course->top_colleges     = College::select("id", "name")->where("course_id", $p_course->id)->orderBy("created_at", "DESC")->limit(10)->get();
            $p_course->popular_colleges = College::select("id", "name")->where("course_id", $p_course->id)->orderBy("created_at", "ASC")->limit(10)->get();
            
            $p_course->districts = $districts;
            
            $courses[] = $p_course;
        }
        
    
        return $courses;
    }
}
