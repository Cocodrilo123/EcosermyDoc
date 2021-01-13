<?php

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

Route::get('/', function () {
    return view('prueba');
});




Route::get('/ecosermyCharges', function () {
    return view('viewCharges/ecosermyCharges');
});
Route::get('/volcanCharges', function () {
    return view('viewCharges/volcanCharges');
});

Route::get('/areas', function () {
    return view('viewAreasProjects/areas');
});

Route::get('/calls', function () {
    return view('viewCalls/calls');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
