<?php

namespace Database\Seeders\data;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $listData = [
            ['code' => 'es', 'name' => 'Español', 'status' => 1, 'order' => 1],
            ['code' => 'en', 'name' => 'English', 'status' => 1, 'order' => 2],
        ];
        foreach ($listData as  $data) {
            if(!Language::where('code', $data['code'])->exists()){
                Language::create($data);
            }
        }
    }
}
