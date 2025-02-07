<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SkillController;
// use App\Http\Controllers\Admin\ProjectController;
// use App\Http\Controllers\Admin\BlogPostController;
// use App\Http\Controllers\Admin\EducationController;
// use App\Http\Controllers\Admin\ExperienceController;
// use App\Http\Controllers\Admin\PersonalInfoController;
// use App\Http\Controllers\Admin\ContactController;
// ... other admin controllers as you create them

Route::prefix('admin')
    ->middleware(['auth'])  // ensures user must be logged in
    ->group(function () {

        // Admin Dashboard home
        Route::get('/', [\App\Http\Controllers\Admin\AdminHomeController::class, 'index'])
            ->name('admin.dashboard');

        // Example resource routes
        Route::resource('skills', SkillController::class);
        // Route::resource('projects', ProjectController::class);
        // Route::resource('blog-posts', BlogPostController::class);
        // Route::resource('education', EducationController::class);
        // Route::resource('experience', ExperienceController::class);
        // Route::resource('personal-info', PersonalInfoController::class);
        // Route::resource('contact', ContactController::class);
        // Repeat for experiences, education, blog, etc.
    });
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
