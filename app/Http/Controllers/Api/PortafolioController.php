<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Education;
use App\Models\Language;
use App\Models\PersonalInformation;
use App\Models\Presentation;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialMedia;
use App\Models\WorkExperience;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PortafolioController extends Controller
{
    public function index(Request $request)
    {
       try {
            $lenguage               = Language::where('code','es')->first();
            $personalInformation    = PersonalInformation::where('language_id', $lenguage->id)->first();
            $presentacion           = Presentation::where('language_id', $lenguage->id)->where('type', 'presentation')->first();        
            $skills                 = Skill::where('language_id', $lenguage->id)->first();      
            $educations             = Education::where('language_id', $lenguage->id)->get();
            $socialMedias           = SocialMedia::where('language_id', $lenguage->id)->get();

            return response()->json([
                'informacionPersonal' => $personalInformation,
                'presentacion' => $presentacion,
                'skills' => $skills,
                'educations' => $educations,
                'socialMedias' => $socialMedias
            ]) ;
        } catch (Exception $ex) {
            Log::error($ex);            
        }
    }
    public function projects(Request $request){
        try {
            $lenguage   = Language::where('code','es')->first();
            $projects   = Category::with([
                'projects'=>fn($q)=>$q
                    ->with(['presentation','projectSkills'=>fn($qu)=>$qu->with(['skill'])])
                    ->where('language_id', $lenguage->id)
                ])->where('language_id', $lenguage->id)->get();
            return response()->json([
                'projects' => $projects
            ]);
        } catch (Exception $ex) {
            Log::error($ex);            
        }
    }

    public function workExperience(Request $request){
        try {
            $lenguage   = Language::where('code','es')->first();
            $workExperience = WorkExperience::with(['tasks','skills'=>fn($q)=>$q->with(['skill'])])->where('language_id', $lenguage->id)->get();
            return response()->json([
                'workExperience' => $workExperience
            ]);
        } catch (Exception $ex) {
            Log::error($ex);            
        }
    }

    public function services(Request $request){
        try {
            $lenguage   = Language::where('code','es')->first();
            $services   = Service::where('language_id', $lenguage->id)->get();
            return response()->json([
                'services' => $services
            ]);
        } catch (Exception $ex) {
            Log::error($ex);            
        }  
    }
}
