<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogPostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/skills', [SkillController::class, 'index']);
Route::post('/skills', [SkillController::class, 'store']);
Route::get('/skills/{id}', [SkillController::class, 'show']);
Route::put('/skills/{id}', [SkillController::class, 'update']);
Route::delete('/skills/{id}', [SkillController::class, 'destroy']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

Route::get('/personal-info', [PersonalInfoController::class, 'index']);
Route::post('/personal-info', [PersonalInfoController::class, 'store']);
Route::get('/personal-info/{id}', [PersonalInfoController::class, 'show']);
Route::put('/personal-info/{id}', [PersonalInfoController::class, 'update']);
Route::delete('/personal-info/{id}', [PersonalInfoController::class, 'destroy']);

Route::get('/experience', [ExperienceController::class, 'index']);
Route::post('/experience', [ExperienceController::class, 'store']);
Route::get('/experience/{id}', [ExperienceController::class, 'show']);
Route::put('/experience/{id}', [ExperienceController::class, 'update']);
Route::delete('/experience/{id}', [ExperienceController::class, 'destroy']);

Route::get('/education', [EducationController::class, 'index']);
Route::post('/education', [EducationController::class, 'store']);
Route::get('/education/{id}', [EducationController::class, 'show']);
Route::put('/education/{id}', [EducationController::class, 'update']);
Route::delete('/education/{id}', [EducationController::class, 'destroy']);

//Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
//Route::get('/contact/{id}', [ContactController::class, 'show']);
//Route::put('/contact/{id}', [ContactController::class, 'update']);
//Route::delete('/contact/{id}', [ContactController::class, 'destroy']);

Route::get('/blog-posts', [BlogPostController::class, 'index']);
Route::post('/blog-posts', [BlogPostController::class, 'store']);
Route::get('/blog-posts/{id}', [BlogPostController::class, 'show']);
Route::put('/blog-posts/{id}', [BlogPostController::class, 'update']);
Route::delete('/blog-posts/{id}', [BlogPostController::class, 'destroy']);
