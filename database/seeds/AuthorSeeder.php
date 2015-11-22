<?php

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $rawData = array_map('str_getcsv', file(__DIR__ . '/../data/authors.csv'));
        $headers = array_shift($rawData);
        $items = array_map(function ($row) use ($headers) { return array_combine($headers, $row);}, $rawData);
        if (!array_walk($items, function ($item) {Author::updateOrCreate(['id' => $item['id']], $item);})) {
            throw new Exception('There was an issue importing authors.');
        }
    }
}
