<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesControllers;
use App\Http\Controllers\PartieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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


// Route::get('/', [PagesControllers::class, 'index'])->name('pages.index');
Route::get('/login1', [PagesControllers::class, 'login'])->name('pages.login');
Route::get('/register1', [PagesControllers::class, 'register'])->name('pages.register');
// Route::get('/templete', function () {
//     return view('templete');
// });
Auth::routes();

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [PagesControllers::class, 'index'])->name('pages.index');

Route::get('/home', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::resource('courses', CourseController::class);
Route::resource('users', UserController::class);
Route::resource('parties', PartieController::class);
Route::resource('categories', CategoryController::class);
Route::resource('assignements', HomeworkSubmissionsController::class);

Route::get('/courses/category_id/{category_id}', [CourseController::class, 'courses_by_category'])->name('courses.by_category');
Route::get('/courses/course_id/{course_id}', [CourseController::class, 'ask_for_course'])->name('courses.demand');
Route::get('/courses/access/{coure_user_id}/{access}', [CourseController::class, 'update_acces_of_course'])->name('courses.update_acces_of_course');
Route::post('/partie/Homework submissions', [PartieController::class, 'remise_devoir'])->name('parties.remise_devoir');
Route::post('/courses/review', [CourseController::class, 'insert_review'])->name('courses.insert_review_comment');

Route::get('/users.all_users', [UserController::class, 'all_users'])->name('users.all_users');
Route::get('/users/profile/{profile_id}',[UserController::class, 'profile'])->name('users.profile');
Route::get('/users/add_admin/{user}',[UserController::class, 'add_admin'])->name('users.add_admin');
Route::get('/users.dashboard_admin',[UserController::class, 'dashboard'])->name('users.dashboard');
Route::post('/users.update_note_devoir',[UserController::class, 'update_note_devoir'])->name('users.update_note_devoir');
// Route::get('/courses.layoutt', [CourseController::class, 'show_all_demands']);

// Route::get('/home', [PagesControllers::class, 'index'])->name('pages.index');