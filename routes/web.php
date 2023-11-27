<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliverableController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\UserController;
use App\Mail\SendEmail;
use App\Models\Project;
use App\Models\Service;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\ResourceCaster;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

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
    $services = Service::where('principal_service', true)->orderBy('id_service', 'asc')->get();
    $projects = Project::orderBy('id_project', 'asc')->get();
    return view('home', compact('projects', 'services'));
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

Route::get('/msg-confirm/{name?}', function ($name = null) {
    $error = session('error'); // Retrieve the flashed error message

    return view('msg-confirm', compact('name', 'error'));
})->name('msg-confirm');

Route::post('send_email', function(HttpRequest $request){
    $name = $request->input('name');

    try {
        Mail::to("victorram2003@gmail.com")->send(new SendEmail($name));
        return Redirect::route('msg-confirm', ['name' => $name]);
    } catch (\Exception $e) {
        // Handle the error, and flash an error message to the session
        FacadesSession::flash('error', 'There was an error sending the email.');
        return Redirect::back();
    }
})->name('send_email');


Route::resource('services', ServiceController::class);
Route::resource('projects', ProjectController::class);
Route::resource('deliverables', DeliverableController::class);
Route::resource('stages', StageController::class);
Route::delete('stages/{stage}/destroy/{customer}', [StageController::class, "destroy"])->name("stages.destroy");
Route::resource('resources', ResourceController::class);
Route::post('resources/store/{customer}/{defaultProject}', [ResourceController::class, "store"])->name('resources.store');
Route::put('resources/update/{defaultProject}', [ResourceController::class, "update"])->name('resources.update');
Route::resource('reviews', ReviewController::class);
Route::post('reviews/store', [ReviewController::class, "store"])->name("reviews.store");
Route::put('reviews/update', [ReviewController::class, "update"])->name("reviews.update");
Route::delete('reviews/{review}/destroy', [ReviewController::class, "destroy"])->name("reviews.destroy");

Route::get('/deliverables/{service}/show/{deliverable}', [DeliverableController::class, "show"])->name('deliverables.show');

Route::resource('customers', CustomerController::class)->names('customers'); 
Route::get('customers/resetDefaultProject/{customer}', [CustomerController::class, 'resetDefaultProject'])->name('customers.resetDefaultProject');

Route::resource('users', UserController::class)->names('users')->middleware('is_admin');
Route::get('/user/search', [UserController::class, "search"])->name('user.search');
// Route::resource('users', UserController::class)->names('users')->except(['show'])->middleware('is_admin');
// Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('customers/{customer}/resources/{defaultProject}', [CustomerController::class, 'resources'])->name('customers.resources');
Route::post('/customers/{customer}/showWithDefaultProject', [CustomerController::class, "showWithDefaultProject"])
    ->name('customers.showWithDefaultProject');
// Route::controller(ClientController::class)->group(function(){
//     Route::get('/clients', "index")->name('clients.index');
//     Route::get('/clients/projects', "projects")->name('clients.projects');
//     Route::get('/clients/resources', "resources")->name('clients.resources');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
