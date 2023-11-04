<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
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
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/msg-confirm', function (HttpRequest $request) {
    $name = $request->input('name');
    return view('msg-confirm', compact('name'));
})->name('msg-confirm');


Route::resource('services', ServiceController::class);
Route::resource('projects', ProjectController::class);
Route::resource('customers', CustomerController::class)->names('customers');
Route::resource('users', UserController::class)->names('users')->middleware('is_admin');
// Route::resource('users', UserController::class)->names('users')->except(['show'])->middleware('is_admin');
// Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('customers/{customer}/resources', [CustomerController::class, 'resources'])->name('customers.resources');
// Route::controller(ClientController::class)->group(function(){
//     Route::get('/clients', "index")->name('clients.index');
//     Route::get('/clients/projects', "projects")->name('clients.projects');
//     Route::get('/clients/resources', "resources")->name('clients.resources');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
