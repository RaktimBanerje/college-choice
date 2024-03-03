<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('college', 'CollegeCrudController');
    Route::crud('college-detail', 'CollegeDetailCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('course', 'CourseCrudController');
    Route::crud('course-detail', 'CourseDetailCrudController');
    Route::crud('country', 'CountryCrudController');
    Route::crud('state', 'StateCrudController');
    Route::crud('district', 'DistrictCrudController');
    Route::crud('lead', 'LeadCrudController');
    Route::crud('exam', 'ExamCrudController');
    Route::crud('notification', 'NotificationCrudController');
}); // this should be the absolute last line of this file