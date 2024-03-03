<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseDetailRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Course;
use App\Models\CourseDetail;

/**
 * Class CourseDetailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseDetailCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CourseDetail::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course-detail');
        CRUD::setEntityNameStrings('course detail', 'course details');
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
           'label'      => 'Course', // Table column heading
           'type'       => 'select',
           'name'       => 'course_id',
           'key'        => 'course', 
           'entity'     => 'course', // the method that defines the relationship in your Model
           'attribute'  => 'short_name', // foreign key attribute that is shown to user
           'model'      => Course::class, // foreign key model
        ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }
    
    public function show($id)
    {
        $course_detail = CourseDetail::find($id);
        $course = Course::find($course_detail->course_id);

        return view("pages.course", ["course" => $course, "course_details" => $course_detail]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CourseDetailRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([   // CKEditor
            'name'          => 'duration',
            'label'         => 'Course duration (in year)',
            'type'          => 'number'
        ]);

        CRUD::field([  // Select2
            'label'     => "Course",
            'type'      => 'select2',
            'name'      => 'course_id', // the db column for the foreign key
            
            // optional
            'entity'    => 'course', // the method that defines the relationship in your Model
            'model'     => "App\Models\Course", // foreign key model
            'attribute' => 'full_name', // foreign key attribute that is shown to user
            
                // also optional
            'options'   => (function ($query) {
                return $query->orderBy('full_name', 'ASC')->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);

        CRUD::field([   // CKEditor
            'name'          => 'overview',
            'label'         => 'Overview',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);

        CRUD::field([   // CKEditor
            'name'          => 'jobs',
            'label'         => 'Industry and Job',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);

        CRUD::field([   // CKEditor
            'name'          => 'syllabus',
            'label'         => 'Syllabus and Subject',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
        ]);

        CRUD::field([   // CKEditor
            'name'          => 'skills',
            'label'         => 'Skills',
            'type'          => 'ckeditor',
        
            // optional:
            'options'       => [
                'autoGrow_minHeight'   => 400,
                'autoGrow_bottomSpace' => 50,
            ]
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

        CRUD::field([   // Table
            'name'            => 'faqs',
            'label'           => 'FAQs',
            'type'            => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns'         => [
                'question'  => 'Question',
                'answer'    => 'Answer',
            ],
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
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
