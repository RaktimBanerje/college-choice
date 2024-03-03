<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LeadCrudController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"]);
Route::get('/course/{slug}/colleges/', [HomeController::class, "colleges_by_course"])->name('course.colleges');
Route::get('/course/{slug}', [HomeController::class, "show_course"])->name('course.colleges');
Route::get('/college/{name}/{id}', [HomeController::class, "get_college"])->name('college.details');
Route::get('/colleges/{course}/{district}/{course_id}/{district_id}', [HomeController::class, "get_course_district_wise_college"])->name('course_district_colleges');

Route::get('/search/{key}', [HomeController::class, "search"])->name('search');

Route::post('/send-query', [LeadCrudController::class, "store"])->name('send-query');
Route::get('/thank-you', [HomeController::class, "thank_you"])->name('thank_you');
