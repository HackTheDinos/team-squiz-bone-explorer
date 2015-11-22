<?php

use App\Models\MediaType;
use Illuminate\Database\Seeder;

class MediaTypeSeeder extends Seeder
{
    public function run()
    {
        $rawData = array_map('str_getcsv', file(__DIR__ . '/../data/media_types.csv'));
        $headers = array_shift($rawData);
        $items = array_map(function ($row) use ($headers) { return array_combine($headers, $row);}, $rawData);
        if (!array_walk($items, function ($item) {MediaType::updateOrCreate(['id' => $item['id']], $item);})) {
            throw new Exception('There was an issue importing media types.');
        }
    }
}
