<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CollegeDetailRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\Pro\Uploads\Validation\ValidDropzone;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\College;
use App\Models\CollegeDetail;
use App\Models\Course;
use App\Models\District;

/**
 * Class CollegeDetailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CollegeDetailCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\Pro\Http\Controllers\Operations\DropzoneOperation;
    

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\CollegeDetail::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/college-detail');
        CRUD::setEntityNameStrings('college detail', 'college details');
    }
    
    public function show($id)
    {
        
        $college_menu = $this->get_colleges_menu();     
        $college_detail = CollegeDetail::find($id);
        $college = College::find($college_detail->college_id);
        $college_details = CollegeDetail::where("college_id", $id)->first();
        return view("pages.college", ["college" => $college, "college_details" => $college_detail, "college_menu" => $college_menu]);

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
        
        CRUD::column([
           'label'      => 'College', // Table column heading
           'type'       => 'select',
           'name'       => 'college_id',
           'key'        => 'college', 
           'entity'     => 'college', // the method that defines the relationship in your Model
           'attribute'  => 'name', // foreign key attribute that is shown to user
           'model'      => College::class, // foreign key model
        ]);
        
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
        CRUD::setValidation(CollegeDetailRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */

        CRUD::field([  // Select2
            'label'     => "College",
            'type'      => 'select2',
            'name'      => 'college_id', // the db column for the foreign key
            
            // optional
            'entity'    => 'college', // the method that defines the relationship in your Model
            'model'     => "App\Models\College", // foreign key model
            'attribute' => 'name', // foreign key attribute that is shown to user
            
                // also optional
            'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);

        
        
        CRUD::field([   // CKEditor
            'name'          => 'info',
            'label'         => 'Information',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);


        CRUD::field([   // Table
            'name'            => 'course',
            'label'           => 'Course',
            'type'            => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns'         => [
                'course'            => 'Course',
                'fees'              => 'Fees',
                'eligibility'       => 'Eigibility',
            ],
        ]);

        
        CRUD::field([   // Table
            'name'            => 'faq',
            'label'           => 'FAQs',
            'type'            => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns'         => [
                'question'  => 'Question',
                'answer'    => 'Answer',
            ],
        ]);


        CRUD::field([   // Table
            'name'            => 'faculty',
            'label'           => 'Faculty Member',
            'type'            => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns'         => [
                'name'              => 'Name',
                'designation'       => 'Designation',
                'qualification'     => 'Qualification',
                'email'             => 'email',
            ],
        ]);


        CRUD::field([   // CKEditor
            'name'          => 'admission',
            'label'         => 'Admission',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);

        
        CRUD::field([   // DROPZONE
            'name'          => 'images',
            'label'         => 'Photo Gallery',
            'type'          => 'dropzone',
            'configuration' => [
                'parallelUploads' => 2,
            ]
        ])->withFiles([
            'disk' => 'public', // the disk where file will be stored
            'path' => 'images', // the path inside the disk where file will be stored
            'fileNamer' => function($file, $uploader) { return uniqid() . "." . $file->getClientOriginalExtension(); },
        ]);
        
        
        CRUD::field([   // Table
            'name'            => 'videos',
            'label'           => 'Video Gallery',
            'type'            => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns'         => [
                'title'  => 'Title',
                'link'   => 'YouTube Link',
            ],
        ]);
        
        CRUD::field([
            'name'      => 'brochure',
            'label'     => 'Brochure',
            'type'      => 'upload',
        ])->withFiles([
            'disk' => 'public', // the disk where file will be stored
            'path' => 'brochure', // the path inside the disk where file will be stored
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
