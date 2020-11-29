<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
    //return view('welcome');
    return view('tzkevidence');
});

Route::post('/students', 'App\Http\Controllers\StudentsController@store');

Route::post('/academicyears', 'App\Http\Controllers\AcademicYearsController@store');
Route::get('/academicyears', 'App\Http\Controllers\AcademicYearsController@index');



Route::group(['middleware' => 'auth'], function(){

    Route::get('/events', 'App\Http\Controllers\EventsController@index');
    Route::get('/events/create', 'App\Http\Controllers\EventsController@create');
    Route::get('/events/{event}', 'App\Http\Controllers\EventsController@show');

    Route::post('/events', 'App\Http\Controllers\EventsController@store');

    Route::post('/events/{event}/payments', 'App\Http\Controllers\EventPaymentsController@store');
    Route::patch('/events/{event}/payments/{payment}', 'App\Http\Controllers\EventPaymentsController@update');
});



Auth::routes();




Route::middleware(['auth:sanctum', 'verified'])->get('/tzkevidence', function () {
    return view('tzkevidence');
})->name('tzkevidence');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('authenticate', '\App\Http\Controllers\Auth\LoginController@doLogin');


/*
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/account', [HomeController::class, 'account'])->name('account');
    Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback');
    Route::get('/help', [HomeController::class, 'help'])->name('help');
});
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
   return view('tzkevidence');
});
//})->name('dashboard');

