<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Language;
use App\Models\PersonalInformation;
use App\Models\Presentation;
use App\Models\Project;
use App\Models\Section;
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
            $lang                   = $request->has('lang') ? $request->lang : 'es';
            $lenguage               = Language::where('code',$lang)->first();
            $personalInformation    = PersonalInformation::where('language_id', $lenguage->id)->first();
            $presentacion           = Presentation::where('language_id', $lenguage->id)->where('type', 'presentation')->first();        
            $skills                 = Skill::where('language_id', $lenguage->id)->orderBy('order')->get();      
            $educations             = Education::where('language_id', $lenguage->id)->orderBy('order')->get();
            $socialMedias           = SocialMedia::where('language_id', $lenguage->id)->orderBy('order')->get();
            $sections               = Section::where('language_id', $lenguage->id)->orderBy('order')->get();

            return response()->json([
                'personalInformation' => $personalInformation,
                'presentation' => $presentacion,
                'skills' => $skills,
                'educations' => $educations,
                'socialMedia' => $socialMedias,
                'sections' => $sections
            ]) ;
        } catch (Exception $ex) {
            Log::error($ex);            
        }
    }
    public function projects(Request $request){
        try {
            $lang       = $request->has('lang') ? $request->lang : 'es';
            $lenguage   = Language::where('code',$lang)->first();
            $projects   = Project::where('language_id', $lenguage->id)->orderBy('order')->get();
            $sections   = Section::where('language_id', $lenguage->id)->orderBy('order')->get();

            return response()->json([
                'projects' => $projects,
                'sections' => $sections
            ]);
        } catch (Exception $ex) {
            Log::error($ex);            
        }
    }

    public function workExperience(Request $request){
        try {
            $lang           = $request->has('lang') ? $request->lang : 'es';
            $lenguage       = Language::where('code',$lang)->first();
            $workExperience = WorkExperience::with(['tasks','skills'])->where('language_id', $lenguage->id)->get();

            $sections       = Section::where('language_id', $lenguage->id)->orderBy('order')->get();

            return response()->json([
                'workExperience' => $workExperience,
                'sections' => $sections
            ]);
        } catch (Exception $ex) {
            Log::error($ex);            
        }
    }

    public function services(Request $request){
        try {
            $lang       = $request->has('lang') ? $request->lang : 'es';
            $lenguage   = Language::where('code',$lang)->first();
            $services   = Service::where('language_id', $lenguage->id)->orderBy('order')->get();
            $sections   = Section::where('language_id', $lenguage->id)->orderBy('order')->get();
            return response()->json([
                'services' => $services,
                'sections' => $sections
            ]);
        } catch (Exception $ex) {
            Log::error($ex);            
        }  
    }
}
