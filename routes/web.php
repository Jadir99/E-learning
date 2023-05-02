<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesControllers;
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