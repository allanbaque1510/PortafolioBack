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

use App\Http\Controllers\AuthController;
use App\Models\Project;
use App\Models\Service;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el login (POST)
Route::post('/login', [AuthController::class, 'login']);

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Grupo de rutas para el panel de administración
Route::middleware('auth')->name('admin.')->group(function () {
    // Ruta del dashboard principal del admin (ya la movimos aquí)
    Route::get('/', function () {
        $projectCount           = Project::where('language_id', '1')->count();
        $serviceCount           = Service::where('language_id', '1')->count();
        $workExperienceCount    = WorkExperience::where('language_id', '1')->count();
        return view('admin.dashboard', compact('projectCount', 'serviceCount', 'workExperienceCount'));
    })->name('dashboard');

    Route::resource('languages',             LanguageController::class);
    Route::resource('personal-information',  PersonalInformationController::class);
    Route::resource('social-media',          SocialMediaController::class);
    Route::resource('education',             EducationController::class);
    Route::resource('skills',                SkillsController::class);
    Route::resource('projects',              ProjectsController::class);
    Route::resource('categories',            CategoryController::class);
    Route::resource('presentations',         PresentationController::class);
    Route::resource('project-skills',        ProjectSkillController::class);
    Route::resource('work-experience',      WorkExperienceController::class);
    Route::resource('work-experience-tasks', WorkExperienceTaskController::class);
    Route::resource('work-experience-skills',WorkExperienceSkillController::class);
    Route::resource('services',              ServiceController::class);
});



