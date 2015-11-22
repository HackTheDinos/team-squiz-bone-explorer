<?php

namespace App\Search;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Client;

class Search
{
    /** @var Client */
    private $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()
            ->setHosts([env('ES_HOST')])
            ->setRetries(3)
            ->build();
    }

    /**
     * Create the index.
     */
    public function createIndex()
    {

        $create = [
            'index' => 'my_index',
            'body' => [
                'settings' => [
                    'number_of_shards' => 3,
                    'number_of_replicas' => 2
                ],
                'mappings' => [
                    'my_type' => [
                        '_source' => [
                            'enabled' => true,
                            'properties' => [
                                'first_name' => [
                                    'type' => 'string',
                                    'analyzer' => 'standard'
                                ],
                                'age' => [
                                    'type' => 'integer'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

    }

    /**
     * Get the schema.
     *
     * @return array
     */
    public function getSchema()
    {

        return [];
    }

    /**
     * Faceted search
     *
     * @param array $params
     */
    public function search(array $params)
    {

    }

    /**
     * Fast search for autocomplete. Only search specific fields.
     *
     * @param $text
     */
    public function searchAutocomplete($text)
    {

    }

    /**
     * Insert a document.
     *
     * @param array $doc
     */
    public function insertDocument(array $doc)
    {

    }

    /**
     * Insert an array of documents.
     *
     * @param array $docs
     */
    public function insertDocuments(array $docs)
    {

    }
}