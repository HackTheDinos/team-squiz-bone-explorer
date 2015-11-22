<?php

use Illuminate\Database\Seeder;
use App\Models\Scan;
use App\Models\Media;
use App\Models\MediaType;

class MediaSeeder extends Seeder
{
    public function run()
    {
        if (class_exists('Faker\Factory')) {
            $faker = Faker\Factory::create();

            $scans = Scan::all()->all();
            $mediaTypes = MediaType::all()->all();

            foreach ($scans as $scan) {
                $count = $faker->randomDigit;
                for ($i=1; $i<=$count; $i++) {
                    Media::create(
                        [
                            'filePath' => '/' . $faker->word,
                            'fileName' => $faker->word . $faker->randomNumber(2)
                                . '.' . $faker->randomElement(['stl','vgl','mov','dct']),
                            'scanId' => $scan->id,
                            'mediaTypeId' => $faker->randomElement($mediaTypes)->id,
                        ]
                    );
                }
            }
        }
    }
}
