<?php

namespace Database\Seeders;

use Database\Seeders\data\CategorySeeder;
use Database\Seeders\data\EducationSeeder;
use Database\Seeders\data\LanguageSeeder;
use Database\Seeders\data\PersonalInformationSeeder;
use Database\Seeders\data\PresentationSeeder;
use Database\Seeders\data\ProjectSeeder;
use Database\Seeders\data\ProjectSkillSeeder;
use Database\Seeders\data\ServiceSeeder;
use Database\Seeders\data\SkillSeeder;
use Database\Seeders\data\SocialMediaSeeder;
use Database\Seeders\data\WorkExperienceSeeder;
use Database\Seeders\data\WorkExperienceSkillSeeder;
use Database\Seeders\data\WorkExperienceTaskSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->comment('Language Seeder inicia ejecucion....');
        $this->call(LanguageSeeder::class);
        
        $this->command->comment('Personal Information Seeder inicia ejecucion....');
        $this->call(PersonalInformationSeeder::class);

        $this->command->comment('Social Media Seeder inicia ejecucion....');
        $this->call(SocialMediaSeeder::class);
        
        $this->command->comment('Education Seeder inicia ejecucion....');
        $this->call(EducationSeeder::class);
        
        $this->command->comment('Category Seeder inicia ejecucion....');
        $this->call(CategorySeeder::class);
        
        $this->command->comment('Skill Seeder inicia ejecucion....');
        $this->call(SkillSeeder::class);
        
        $this->command->comment('Presentation Seeder inicia ejecucion....');
        $this->call(PresentationSeeder::class);
        
        $this->command->comment('Project Seeder inicia ejecucion....');
        $this->call(ProjectSeeder::class);
        
        $this->command->comment('Project Skill Seeder inicia ejecucion....');
        $this->call(ProjectSkillSeeder::class);
        
        $this->command->comment('Work Experience Seeder inicia ejecucion....');
        $this->call(WorkExperienceSeeder::class);
        
        $this->command->comment('Work Experience Task Seeder inicia ejecucion....');
        $this->call(WorkExperienceTaskSeeder::class);
        
        $this->command->comment('Work Experience Skill Seeder inicia ejecucion....');
        $this->call(WorkExperienceSkillSeeder::class);
        
        $this->command->comment('Service Seeder inicia ejecucion....');
        $this->call(ServiceSeeder::class);

      
    }
}
