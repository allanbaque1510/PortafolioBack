<?php



use App\Http\Controllers\Api\PortafolioController;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('portafolio',                    [PortafolioController::class, 'index']);
Route::get('portafolio/projects',           [PortafolioController::class, 'projects']);
Route::get('portafolio/work-experience',    [PortafolioController::class, 'workExperience']);
Route::get('portafolio/services',    [PortafolioController::class, 'services']);

