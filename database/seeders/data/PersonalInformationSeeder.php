<?php

namespace Database\Seeders\data;

use App\Models\PersonalInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $listData = [
            [
                'name' => 'Allan Joel',
                'lastname' => 'Baque Jacome',
                'identification' => '066515566',
                'cellphone' => '+546523326542',
                'email' => 'allan@prueba.com',
                'location' => 'Norte',
                'city' => 'Guayaquil',
                'state' => 'Guayas',
                'country' => 'Ecuador',
                'foto' => 'allan.jpg',
                'fotoThumbrl' => 'allan_thumb.jpg',
                'cv_file' => 'allan_cv.pdf',
                'language_id' => 1,
                'status' => 1,
                'order' => 1,
            ],
            [
                'name' => 'Allan Joel',
                'lastname' => 'Baque Jacome',
                'identification' => '066515566',
                'cellphone' => '+546523326542',
                'email' => 'allan@prueba.com',
                'location' => 'North',
                'city' => 'Guayaquil',
                'state' => 'Guayas',
                'country' => 'Ecuador',
                'foto' => 'allan.jpg',
                'fotoThumbrl' => 'allan_thumb.jpg',
                'cv_file' => 'allan_cv.pdf',
                'language_id' => 2,
                'status' => 1,
                'order' => 1,
            ],
        ];

        foreach ($listData as $data) {
            if (! PersonalInformation::where('language_id', $data['language_id'])->exists()) {
                PersonalInformation::create($data);
            }
        }
    }
}
