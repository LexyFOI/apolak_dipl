<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Models\Event;

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
    return view('welcome');
});

Route::post('/students', 'App\Http\Controllers\StudentsController@store');

Route::post('/academicyears', 'App\Http\Controllers\AcademicYearsController@store');
Route::get('/academicyears', 'App\Http\Controllers\AcademicYearsController@index');


Route::get('/events', 'App\Http\Controllers\EventsController@index');
Route::post('/events', 'App\Http\Controllers\EventsController@store');
