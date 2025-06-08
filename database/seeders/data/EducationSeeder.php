<?php

namespace Database\Seeders\data;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
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
                'institution' => 'Universidad de Telemática',
                'level' => 'Grado',
                'profession' => 'Ingeniero en Telemática',
                'start_date' => '2017',
                'end_date' => '2022',
                'city' => 'Guayaquil',
                'country' => 'Ecuador',
                'description' => 'Estudios universitarios completos.',
                'language_id' => 1,
                'status' => 1,
                'order' => 1,
            ],
        ];

        foreach ($listData as  $data) {
            $first = Education::where('institution', $data['institution'])->where('language_id', $data['language_id'])->where('status',1)->first();
            if($first){
                $first->fill($data);
                if ($first->isDirty()) {
                    $first->save();
                }   
                $contador['actualizado']++;
            }else{
                Education::create($data);
                $contador['creado']++;
            }
        }
        $this->command->info('Actualizados: '.$contador['actualizado']);
        $this->command->info('Creados: '.$contador['creado']);
    }
}
