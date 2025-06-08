<?php

namespace Database\Seeders\data;

use App\Models\WorkExperienceTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkExperienceTaskSeeder extends Seeder
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
                'work_experience_id' => 1,
                'title' => 'Automatización de procesos',
                'description' => 'Reducción del tiempo de generación de reportes en 60%.',
                'language_id' => 1,
                'status' => 1,
                'order' => 1,
            ],
        ];

        foreach ($listData as  $data) {
            $first = WorkExperienceTask::where('work_experience_id', $data['work_experience_id'])->where('language_id', $data['language_id'])->where('status',1)->first();
            if($first){
                $first->fill($data);
                if ($first->isDirty()) {
                    $first->save();
                }   
                $contador['actualizado']++;
            }else{
                WorkExperienceTask::create($data);
                $contador['creado']++;
            }
        }
        $this->command->info('Actualizados: '.$contador['actualizado']);
        $this->command->info('Creados: '.$contador['creado']);

    }
}
