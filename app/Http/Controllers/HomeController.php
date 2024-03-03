<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\CollegeDetail;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get Course
        $courses = $this->get_course();
    
        // Top College District Wise
        $colleges = $this->get_district_wise_college();
        
        
        // Top College District Wise
        $college_menu = $this->get_colleges_menu();
    
        $course_data = Course::select("id", "short_name")->get();
        $district_data = District::select("id", "name")->get();
        
        // dd($college_menu);
    
        return view("pages.home", [
            "courses"           =>  $courses,
            "categories"        =>  $colleges,
            "college_menu"      =>  $college_menu,
            "course_array"      => $course_data,
            "district_array"    => $district_data
        ]);
    }
    
    
    public function get_college(Request $request)
    {
        // Top College District Wise
        $college_menu = $this->get_colleges_menu();        
        
        $college = College::find($request->id);
        $college_details = CollegeDetail::where("college_id", $college->id)->first();
        
        $course_data = Course::select("id", "short_name")->get();
        $district_data = District::select("id", "name")->get();
        
        return view("pages.college", [
            "college"           => $college, 
            "college_details"   => $college_details, 
            "college_menu"      => $college_menu,
            "course_array"      => $course_data,
            "district_array"    => $district_data
        ]);
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
    
    public function show_course(Request $request)
    {
        $course = Course::where("slug", $request->slug)->first();
        $course_details = CourseDetail::where("course_id", $course->id)->first();

        // dd($course, $course_details);
        
        $college_menu = $this->get_colleges_menu();

        return view("pages.course", ["course" => $course, "course_details" => $course_details, "college_menu" => $college_menu]);
    }
    
    
    public function get_course()
    {
        $parent_course = Course::where("course_id", 0)->get();
        $courses = [];
        foreach($parent_course as $course) {
            $course->childs = Course::where("course_id", $course->id)->get();
            $courses[] = $course; 
        }
        
        return $courses;
    }
    
    
    public function get_district_wise_college()
    {
        $parent_course  = Course::where("course_id", 0)->get();
        $districts      = District::where("state_id", 1)->get();
        $colleges       =  [];
        
        foreach($parent_course as $course) {
            
            $district_colleges = [];
            foreach($districts as $district) {
                $data  = College::where(["district_id" => $district->id, "course_id" => $course->id])->get();
                
                if($data->count() <= 2) {
                    continue;
                }
                
                $logos = [];
                for($i = 0; $i < 3 ; $i++){
                    $logos[] = $data[$i]->logo;
                }
                
                $district->number_of_colleges   = $data->count();
                $district->bg_image             = $data[0]->cover_image;
                $district->logos                = $logos;
                
                $district_colleges[]    = $district;
            }
            
            $course->districts = $district_colleges;
            
            $colleges[] = $course; 
        }
        
        return $colleges;
    }
    
    
    public function colleges_by_course(Request $request)
    {
        $college_menu = $this->get_colleges_menu();
        
        $course = Course::where("slug", $request->slug)->first();
        
        if($course->course_id == 0)
        {
            $colleges = College::where("course_id", $course->id)->get();
        }
        else 
        {
            $colleges = College::where("course_id", $course->course_id)->get();
        }
        
        return view("pages.colleges", [
            "course"        =>  $course,
            "colleges"      =>  $colleges,
            "college_menu"  => $college_menu
        ]);
    }
    
    
    public function get_course_district_wise_college(Request $request)
    {
        $course = Course::find($request->course_id);
        $district = District::find($request->district_id);
        
        $colleges  = College::where(["district_id" => $request->district_id, "course_id" => $request->course_id])->get();
        
        $college_menu = $this->get_colleges_menu();
        
        return view("pages.colleges", [
            "course"        =>  $course,
            "district"      =>  $district,
            "colleges"      =>  $colleges,
            "college_menu"  =>  $college_menu
        ]);
    }
    
    public function search(Request $request)
    {
        $colleges = College::select("id", "name", "title", "logo")->where("name", "LIKE", "$request->key%")->get()->toArray();
        $courses  = Course::select("id", "short_name", "slug")->where("short_name", "LIKE", "$request->key%")->get()->toArray();
        
        return json_encode(["colleges" => $colleges, "courses" => $courses]);
    }
    
    public function thank_you(Request $request) 
    {
        echo "Thank You";    
    }
}
