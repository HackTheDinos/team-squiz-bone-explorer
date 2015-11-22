<?php

use App\Models\Museum;
use Illuminate\Database\Seeder;

class MuseumSeeder extends Seeder
{
    public function run()
    {
        $rawData = array_map('str_getcsv', file(__DIR__ . '/../data/museums.csv'));
        $headers = array_shift($rawData);
        $items = array_map(function ($row) use ($headers) { return array_combine($headers, $row);}, $rawData);
        if (!array_walk($items, function ($item) {Museum::updateOrCreate(['id' => $item['id']], $item);})) {
            throw new Exception('There was an issue importing museums.');
        }
    }
}
