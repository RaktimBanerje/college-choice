<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CollegeRequest;
use App\Models\College;
use App\Models\CollegeDetail;
use App\Models\Course;
use App\Models\District;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CollegeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CollegeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\College::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/college');
        CRUD::setEntityNameStrings('college', 'colleges');
    }


    public function show($id)
    {
        $college_menu = $this->get_colleges_menu();     
        $college = College::find($id);
        $college_details = CollegeDetail::where("college_id", $id)->first();
        return view("pages.college", ["college" => $college, "college_details" => $college_details, "college_menu" => $college_menu]);
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
        CRUD::setValidation(CollegeRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
         
        CRUD::field([  // Select2
            'label'     => "College Category",
            'type'      => 'select2',
            'name'      => 'course_id', // the db column for the foreign key
            'placeholder'   => 'Select a category',
            
            // optional
            'entity'    => 'course', // the method that defines the relationship in your Model
            'model'     => "App\Models\Course", // foreign key model
            'attribute' => 'short_name', // foreign key attribute that is shown to user
                    
            // also optional
            'options'   => (function ($query) {
                return $query->whereNot("course_id", 0)->orderBy('created_at', 'DESC')->get();
            }), 
            // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        
        CRUD::field([  // Select2
            'label'     => "District",
            'type'      => 'select2_grouped',
            'name'      => 'district_id', // the db column for the foreign key
            'placeholder'   => 'Select a district',
            
            // optional
            'entity'    => 'district', // the method that defines the relationship in your Model
            'model'     => "App\Models\District", // foreign key model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'group_by'  => 'state', // the relationship to entity you want to use for grouping
            'group_by_attribute' => 'name', // the attribute on related model, that you want shown
            'group_by_relationship_back' => 'district'
                    
            //     // also optional
            // 'options'   => (function ($query) {
            //         return $query->orderBy('name', 'ASC')->get();
            //     }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        
        CRUD::field([
            'name'      => 'logo',
            'label'     => 'Logo',
            'type'      => 'upload',
        ])->withFiles([
            'disk' => 'public', // the disk where file will be stored
            'path' => 'logo', // the path inside the disk where file will be stored
            'fileNamer' => function($file, $uploader) { return uniqid() . "." . $file->getClientOriginalExtension(); },
        ]);

        CRUD::field([
            'name'      => 'cover_image',
            'label'     => 'Cover image',
            'type'      => 'upload',
        ])->withFiles([
            'disk' => 'public', // the disk where file will be stored
            'path' => 'cover_image', // the path inside the disk where file will be stored
            'fileNamer' => function($file, $uploader) { return uniqid() . "." . $file->getClientOriginalExtension(); },
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
