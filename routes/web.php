<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('publicHome');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Auth::routes();

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::resource('services', ServiceController::class);
Route::resource('projects', ProjectController::class);
Route::resource('customers', CustomerController::class)->names('customers');
Route::resource('users', UserController::class)->names('users')->middleware('is_admin');;
Route::get('customers/{customer}/resources', [CustomerController::class, 'resources'])->name('customers.resources');
// Route::controller(ClientController::class)->group(function(){
//     Route::get('/clients', "index")->name('clients.index');
//     Route::get('/clients/projects', "projects")->name('clients.projects');
//     Route::get('/clients/resources', "resources")->name('clients.resources');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
