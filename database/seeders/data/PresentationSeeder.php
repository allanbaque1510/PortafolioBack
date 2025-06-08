<?php

namespace Database\Seeders\data;

use App\Models\Presentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentationSeeder extends Seeder
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
                'title' => 'Sobre mí',
                'content' => 'Soy un desarrollador con experiencia en Laravel y Angular.',
                'image' => null,
                'video_url' => null,
                'type' => 'presentation',
                'language_id' => 1,
                'status' => 1,
                'order' => 1,
            ],
        ];

        foreach ($listData as  $data) {
            $first = Presentation::where('title', $data['title'])->where('type', $data['type'])->where('language_id', $data['language_id'])->where('status',1)->first();
            if($first){
                $first->fill($data);
                if ($first->isDirty()) {
                    $first->save();
                }   
                $contador['actualizado']++;
            }else{
                Presentation::create($data);
                $contador['creado']++;
            }
        }
        $this->command->info('Actualizados: '.$contador['actualizado']);
        $this->command->info('Creados: '.$contador['creado']);
    }
}
