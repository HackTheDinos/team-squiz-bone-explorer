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
            $images = [
                '/img/eusthenopteron_foordi.jpg',
                '/img/iridotriton_hechti.jpg',
                '/img/sipalocyon_sp.jpg',
                '/img/teinolophos_trusleri.jpg',
            ];

            foreach ($scans as $scan) {
                for ($i=1; $i<=500; $i++) {
                    Image::create(
                        [
                            'filePath' => '/' . $faker->word,
                            'fileName' => $faker->word . $faker->randomNumber(2) . '.tif',
                            'fileUrl' => $faker->randomElement($images),
                            'scanId' => $scan->id,
                        ]
                    );
                }
            }
        }
    }
}
