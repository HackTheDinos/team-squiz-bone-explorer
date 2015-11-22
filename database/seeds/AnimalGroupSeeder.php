<?php

use App\AnimalGroup;
use Illuminate\Database\Seeder;

class AnimalGroupSeeder extends Seeder
{
    public function run()
    {
        $rawData = array_map('str_getcsv', file(__DIR__ . '/../data/animal_groups.csv'));
        $headers = array_shift($rawData);
        $items = array_map(function ($row) use ($headers) { return array_combine($headers, $row);}, $rawData);
        if (!array_walk($items, function ($item) {AnimalGroup::updateOrCreate(['id' => $item['id']], $item);})) {
            throw new Exception('There was an issue importing animal groups.');
        }
    }
}
