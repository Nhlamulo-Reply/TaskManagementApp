<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and assigned
| to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('welcome');
});

// Authenticated home route
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Admin Routes - Only accessible by admins
Route::middleware('admin')->group(function () {
    // View all users
    Route::get('/admin/view-users', [AdminController::class, 'viewUsers'])->name('admin.view-users');

    // Manage users
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage-users');

    // View logs
    Route::get('/admin/view-logs', [AdminController::class, 'viewLogs'])->name('admin.view-logs');

    // Admin notifications
    Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Task management (using resource routes for all CRUD actions)
    Route::resource('tasks', TaskController::class);
    // Custom route for showing a specific task (if needed)
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
});

// Users list for admins
Route::get('/users', [TaskController::class, 'listUsers'])->middleware('auth');

// Add task for admin (custom route)
Route::get('/add-task', [HomeController::class, 'index'])->middleware(['auth','admin']);

require __DIR__.'/auth.php';
