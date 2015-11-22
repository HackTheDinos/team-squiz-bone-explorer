<?php

use App\Models\Scan;
use Illuminate\Database\Seeder;
use App\Models\Specimen;
use App\Models\Museum;
use App\Models\Author;
use App\Models\AnimalGroup;
use App\Models\MediaType;

class ScanSeeder extends Seeder
{
    public function run()
    {
        if (class_exists('Faker\Factory')) {
            $faker = Faker\Factory::create();

            $specimens = Specimen::all()->all();
            $museums = Museum::all()->all();
            $authors = Author::all()->all();
            $animalGroups = AnimalGroup::all()->all();

            for ($i=1; $i<=500; $i++) {
                Scan::create(
                    [
                        'scanId' => $faker->randomNumber(5),
                        'scanQuality' => $faker->randomElement(
                            ['low', 'medium', 'high']
                        ),
                        'fileDirectory' => '//scan' . $faker->randomNumber(2),
                        'location' => $faker->country,
                        'scanTime' => $faker->dateTime,
                        'voltage' => $faker->randomFloat(2, 1, 20),
                        'voxelSize' => $faker->randomFloat(1, 0, 1) . 'mm',
                        'imageCount' => $faker->randomNumber(4),
                        'current' => '120v',
                        'sequence' => $faker->randomNumber(4),
                        'specimenId' => $faker->randomElement($specimens)->id,
                        'museumId' => $faker->randomElement($museums)->id,
                        'authorId' => $faker->randomElement($authors)->id,
                        'animalGroupId' => $faker->randomElement($animalGroups)->id,
                    ]
                );
            }
        }
    }
}
