<?php
/**
 * Created by PhpStorm.
 * User: cc
 * Date: 11/22/15
 * Time: 1:36 AM
 */

namespace App\Search;


use Elasticsearch\ClientBuilder;

class Search
{

    public function __construct()
    {
        $client = ClientBuilder::create()->setHosts([env('ES_HOST')])->build();
    }
}