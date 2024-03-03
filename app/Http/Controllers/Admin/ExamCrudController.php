<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ExamRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\College;
use App\Models\Course;
use App\Models\District;
use App\Models\Exam;

/**
 * Class ExamCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ExamCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Exam::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/exam');
        CRUD::setEntityNameStrings('exam', 'exams');
    }

    public function show($id)
    {
        $college_menu = $this->get_colleges_menu();
        $exam = Exam::find($id);
        return view("pages.exam", ["exam" => $exam, "college_menu" => $college_menu]);
    }
    
    
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
        ]);
        
        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
        ]);
    
        $this->crud->addColumn([
            'name' => 'mode',
            'label' => 'Mode',
            'type' => 'text',
        ]);
    
        $this->crud->addColumn([
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date',
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
        CRUD::setValidation(ExamRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([   // CKEditor
            'name'          => 'name',
            'label'         => 'Name',
            'type'          => 'text'
        ])->tab('Exam Details');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'title',
            'label'         => 'Title',
            'type'          => 'text'
        ])->tab('Exam Details');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'mode',
            'label'         => 'Exam Mode',
            'type'          => 'select_from_array',
            'options'       => ['' => 'Select', 'ONLINE' => 'Online', 'OFFLINE' => 'Offline'],
            'allows_null'   => false,
            'default'       => '',
        ])->tab('Exam Details');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'date',
            'label'         => 'Exam Date',
            'type'          => 'date'
        ])->tab('Exam Details');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'overview',
            'label'         => 'Overview',
            'type'          => 'ckeditor',
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ])->tab('Overview');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'process',
            'label'         => 'Process',
            'type'          => 'ckeditor',
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ])->tab('Process');
        
        CRUD::field([
            'name'  => 'question_papers',
            'label' => 'Previous Year Question Papers',
            'type'  => 'repeatable',
            'subfields' => [
                [
                    'name'  => 'description',
                    'label' => 'Description',
                    'type'  => 'text', // You can adjust the field type as needed (e.g., text, select, etc.)
                ],
                [
                    'name'  => 'pdf_file',
                    'label' => 'Upload PDF',
                    'type'  => 'upload',
                    'withFiles'  => [
                        'disk' => 'public', // the disk where file will be stored
                        'path' => 'questions', // the path inside the disk where file will be stored
                        'fileNamer' => function($file, $uploader) { return uniqid() . "." . $file->getClientOriginalExtension(); },
                    ]
                ],
            ],
        ])->tab('Question Papers');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'syllabus',
            'label'         => 'Syllabus',
            'type'          => 'ckeditor',
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ])->tab('Syllabus');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'preparation_tips',
            'label'         => 'Exam Preparation Tips',
            'type'          => 'ckeditor',
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ])->tab('Preparation Tips');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'cutoff',
            'label'         => 'Cut Off',
            'type'          => 'ckeditor',
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ])->tab('Cut Off');
        
        
        CRUD::field([   // CKEditor
            'name'          => 'news',
            'label'         => 'Exam News',
            'type'          => 'ckeditor',
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ])->tab('News');
        
        CRUD::field([   // SelectMultiple = n-n relationship (with pivot table)
            'label'     => "Participating Colleges",
            'type'      => 'select2_multiple',
            'name'      => 'colleges', // the method that defines the relationship in your Model
        
            // optional
            'entity'    => 'college', // the method that defines the relationship in your Model
            'model'     => "App\Models\College", // foreign key model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot'     => true, 
        
            // also optional
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ])->tab('Participating Colleges');
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
