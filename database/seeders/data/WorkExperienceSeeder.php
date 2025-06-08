<?php

namespace Database\Seeders\data;

use App\Models\WorkExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $contador = [
            'actualizado'=>0,
            'creado'=>0
        ];

        $listData = [
            [
                'company_name' => 'Mundo Web',
                'position' => 'Desarrollador Fullstack',
                'description' => 'Trabajo con tecnologías como Angular y Laravel.',
                'achievements' => 'Automatización de reportes, mejora de rendimiento.',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'is_current' => 1,
                'company_logo' => 'mundoweb.png',
                'company_website' => 'https://mundoweb.com',
                'company_location' => 'Guayaquil, Ecuador',
                'language_id' => 1,
                'status' => 1,
                'order' => 1,
            ],
        ];

        foreach ($listData as  $data) {
            $first = WorkExperience::where('company_name', $data['company_name'])->where('language_id', $data['language_id'])->where('status',1)->first();
            if($first){
                $first->fill($data);
                if ($first->isDirty()) {
                    $first->save();
                }   
                $contador['actualizado']++;
            }else{
                WorkExperience::create($data);
                $contador['creado']++;
            }
        }
        $this->command->info('Actualizados: '.$contador['actualizado']);
        $this->command->info('Creados: '.$contador['creado']);
    }
}
