<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('book',[PropertyController::class, 'show']);



Auth::routes();

Route::get('/list', function () {
    return view('list');
});

//Route::get('/book', function () {
 //   return view('book');
//});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/property', [App\Http\Controllers\PropertyController::class, 'property'])->name('property');

Route::post('/property', [App\Http\Controllers\PropertyController::class, 'propertyForm']);
Route::view("form", "property");

Route::post('/search-properties', [App\Http\Controllers\PropertyController::class, 'searchProperties']);
Route::get('property_list', 'Property@properties_list');



Route::get('/makebooking/{id}', [App\Http\Controllers\PropertyController::class, 'copyBooking']);
Route::get('/booked', [App\Http\Controllers\PropertyController::class, 'showBooked']);

