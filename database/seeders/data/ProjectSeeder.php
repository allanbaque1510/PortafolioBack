<?php

namespace Database\Seeders\data;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
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
                'title' => 'Mi Portafolio',
                'description' => 'Proyecto personal para mostrar mis habilidades y experiencia.',
                'url' => 'https://allan.dev',
                'image' => 'portfolio.jpg',
                'github_url' => 'https://github.com/allan/portfolio',
                'start_date' => '2023-01-01',
                'end_date' => '2023-06-01',
                'category_id' => 1,
                'presentation_id' => 1,
                'language_id' => 1,
                'status' => 1,
                'order' => 1,
            ],
        ];

        foreach ($listData as  $data) {
            $first = Project::where('title', $data['title'])->where('language_id', $data['language_id'])->where('status',1)->first();
            if($first){
                $first->fill($data);
                if ($first->isDirty()) {
                    $first->save();
                }   
                $contador['actualizado']++;
            }else{
                Project::create($data);
                $contador['creado']++;
            }
        }
        $this->command->info('Actualizados: '.$contador['actualizado']);
        $this->command->info('Creados: '.$contador['creado']);

    }
}
