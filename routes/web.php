<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// route untuk default
Route::get('/', function () {
    return view('welcome');
});

// route resource untuk employees
Route::resource('employees',EmployeeController::class);

// route resource untuk departemen
Route::resource('departemen',DepartemenController::class);

// route resource untuk positions
Route::resource('positions',PositionsController::class);

// route resource untuk attendance
Route::resource('attendance',AttendanceController::class);

// route resource untuk salary
Route::resource('salaries',SalariesController::class);

// route resource untuk project
Route::resource('projects',ProjectController::class);