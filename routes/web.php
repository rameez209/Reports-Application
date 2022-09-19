<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ForgotPassword;
use App\Models\Departments;

// Created on July 16, 2022 by Rameez Mohammad 

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


// Common Resource Routes:
// index - Show all reports
// show - show single report
// create - show form to create new report
// store - Store new report
// edit = show form to edit report
// update - update report 
// destroy - delete report

// All Report
Route::get('/', [ReportController::class, 'index']);

// Show Create Form
Route::get('/reports/create', [ReportController::class, 'create'])->middleware('auth');

// Store Report Data
Route::post('/reports', [ReportController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->middleware('auth');

// Update Report
Route::PUT('/reports/{report}', [ReportController::class, 'update'])->middleware('auth');

// Delete report
Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->middleware('auth');

// Manage reports
// Route::get('/reports/manage', [ReportController::class, 'manage'])->middleware('auth');
Route::get('/reports/manage', [ReportController::class, 'manage'])->middleware('auth');

// Single Report
Route::get('/reports/{report}', [ReportController::class, 'show']);

//    ==================================================================
//  ============       Department Controller      =========================
//    ==================================================================
Route::get('/departments/create', [DepartmentsController::class, 'create'])->middleware('auth');
// Store Data
Route::post('/departments', [DepartmentsController::class, 'store'])->middleware('auth');
// Delete Data
Route::delete('/departments/{departments}', [DepartmentsController::class, 'destroy'])->middleware('auth');

// Hmmmmmm Maybe ....
// Route::delete('/departments/{departments}','DepartmentsController@destroy')->name('departments.destroy');
// Route::delete('/departments/{departments}','DepartmentsController@destroy')->name('departments.destroy');




// Create New User
Route::post('/users', [UserController::class, 'store']);

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// // Route Admin

// THIS MIDDLEWARE ROUTE WILL GIVE ACCESS TO ADMIN AND EDITOR
Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::get("/reports/manage", [ReportController::class, 'manage'])->name("manage");
    Route::get('/register', [UserController::class, 'create']);
    
});

// ADMIN DASHBOARD ---- ONLY ADMIN ACCESS
Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::get("/reports/dashboard", [ReportController::class, 'dashboard'])->name("dashboard");
});

