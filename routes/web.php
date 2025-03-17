<?php

use App\Http\Controllers\AdminPropertiesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeLandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
});

Route::get('/hello/{name?}', function (string $name = "Pepe") {
    return 'Hello '.$name . ', welcome to Laravel.';
});

/* Route::get('/', [SiteController::class, 'index']);
Route::get('/services', [SiteController::class, 'services']);
Route::get('/contact', [SiteController::class, 'contact']);
Route::get('/about', [SiteController::class, 'about']); */

Route::get('/', [HomeLandController::class, 'index'])->name('home');
Route::get('/buy', [HomeLandController::class, 'buy'])->name('buy');
Route::get('/rent', [HomeLandController::class, 'rent'])->name('rent');
Route::get('/properties', [HomeLandController::class, 'properties'])->name('properties');
Route::get('/properties/{property_listing_type_id}', [HomeLandController::class, 'properties_listing_type'])->name('properties_listing_type');
Route::match(['get', 'post'], '/property_details/{property_id}', [HomeLandController::class, 'property_details', 'relatedProperties'])->name('property_details');
Route::get('/about', [HomeLandController::class, 'about'])->name('about');
Route::match(['get', 'post'], '/contact', [HomeLandController::class, 'contact'])->name('contact');
Route::get('/login', [HomeLandController::class, 'login'])->name('login');
Route::get('/register', [HomeLandController::class, 'register'])->name('register');

Route::get('/admin/properties', [AdminPropertiesController::class, 'index'])->name('admin.properties.index');
Route::get('/admin/employees', [EmployeesController::class, 'index'])->name('admin.employees.index');

Route::get('/admin/employees_fetch', [EmployeesController::class, 'employees_fetch'])->name('admin.employees.employees_fetch');
