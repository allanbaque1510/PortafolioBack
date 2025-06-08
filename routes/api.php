<?php

use App\Http\Controllers\Api\Mantenedores\CategoryController;
use App\Http\Controllers\Api\Mantenedores\EducationController;
use App\Http\Controllers\Api\Mantenedores\LanguageController;
use App\Http\Controllers\Api\Mantenedores\PersonalInformationController;
use App\Http\Controllers\Api\Mantenedores\PresentationController;
use App\Http\Controllers\Api\Mantenedores\ProjectsController;
use App\Http\Controllers\Api\Mantenedores\ProjectSkillController;
use App\Http\Controllers\Api\Mantenedores\ServiceController;
use App\Http\Controllers\Api\Mantenedores\SkillsController;
use App\Http\Controllers\Api\Mantenedores\SocialMediaController;
use App\Http\Controllers\Api\Mantenedores\WorkExperienceController;
use App\Http\Controllers\Api\Mantenedores\WorkExperienceSkillController;
use App\Http\Controllers\Api\Mantenedores\WorkExperienceTaskController;
use App\Http\Controllers\Api\PortafolioController;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::apiResource('languages',             LanguageController::class);
Route::apiResource('personal-information',  PersonalInformationController::class);
Route::apiResource('social-media',          SocialMediaController::class);
Route::apiResource('education',             EducationController::class);
Route::apiResource('skills',                SkillsController::class);
Route::apiResource('projects',              ProjectsController::class);
Route::apiResource('categories',            CategoryController::class);
Route::apiResource('presentations',         PresentationController::class);
Route::apiResource('project-skills',        ProjectSkillController::class);
Route::apiResource('work-experiences',      WorkExperienceController::class);
Route::apiResource('work-experience-tasks', WorkExperienceTaskController::class);
Route::apiResource('work-experience-skills',WorkExperienceSkillController::class);
Route::apiResource('services',              ServiceController::class);

Route::get('portafolio',                    [PortafolioController::class, 'index']);
Route::get('portafolio/projects',           [PortafolioController::class, 'projects']);
Route::get('portafolio/work-experience',    [PortafolioController::class, 'workExperience']);

