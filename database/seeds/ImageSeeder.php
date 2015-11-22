<?php

use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\Scan;

class ImageSeeder extends Seeder
{
    public function run()
    {
        if (class_exists('Faker\Factory')) {
            $faker = Faker\Factory::create();

            $scans = Scan::all()->all();

            foreach ($scans as $scan) {
                for ($i=1; $i<=50; $i++) {
                    Image::create(
                        [
                            'filePath' => '/' . $faker->word,
                            'fileName' => $faker->word . $faker->randomNumber(2) . '.tif',
                            'scanId' => $scan->id,
                        ]
                    );
                }
            }
        }
    }
}
