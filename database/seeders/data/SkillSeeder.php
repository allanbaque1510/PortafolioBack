<?php

namespace Database\Seeders\data;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
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
                'name' => 'Laravel',
                'description' => 'Framework PHP para backend',
                'slug' => 'laravel',
                'icon' => 'laravel-icon',
                'start_date' => '2019-01-01',
                'language_id' => 1,
                'status' => 1,
                'order' => 1,
            ],
        ];

        foreach ($listData as  $data) {
            $first = Skill::where('name', $data['name'])->where('language_id', $data['language_id'])->where('status',1)->first();
            if($first){
                $first->fill($data);
                if ($first->isDirty()) {
                    $first->save();
                }   
                $contador['actualizado']++;
            }else{
                Skill::create($data);
                $contador['creado']++;
            }
        }
        $this->command->info('Actualizados: '.$contador['actualizado']);
        $this->command->info('Creados: '.$contador['creado']);

    }
}
