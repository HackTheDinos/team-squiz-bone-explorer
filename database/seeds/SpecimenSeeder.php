<?php

use App\Models\Specimen;
use Illuminate\Database\Seeder;

class SpecimenSeeder extends Seeder
{
    public function run()
    {
        $rawData = array_map('str_getcsv', file(__DIR__ . '/../data/specimens.csv'));
        $headers = array_shift($rawData);
        $items = array_map(function ($row) use ($headers) { return array_combine($headers, $row);}, $rawData);
        if (!array_walk($items, function ($item) {Specimen::updateOrCreate(['id' => $item['id']], $item);})) {
            throw new Exception('There was an issue importing specimens.');
        }
    }
}
