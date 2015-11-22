<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(AnimalGroupSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(MediaTypeSeeder::class);
        $this->call(MuseumSeeder::class);

        $this->call(SpecimenSeeder::class);
        $this->call(ScanSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(ImageSeeder::class);

        Model::reguard();
    }
}
