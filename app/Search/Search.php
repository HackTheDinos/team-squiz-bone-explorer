<?php

namespace App\Search;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Client;

class Search
{
    /** @var Client */
    private $client;
    private $type = "dinos";

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
        // Try to delete the index if it already exists.
        try {
            $this->client->indices()->delete(['index' => env('ES_INDEX')]);
        }
        catch (\Exception $e) {

        }

        // Create the mapping
        $params = [
            'index' => env('ES_INDEX'),
            'body' => [
                'settings' => [
                    'number_of_shards' => 1,
                    'number_of_replicas' => 0,
                    'analysis' => [
                        'filter' => [
                            'autocomplete_filter' => [
                                'type' => 'ngram',
                                'min_gram' => 3,
                                'max_gram' => 20,
                            ],
                        ],
                        'analyzer' => [
                            'autocomplete' => [
                                'type' => 'custom',
                                'tokenizer' => 'standard',
                                'filter' => [
                                    'lowercase',
                                    'autocomplete_filter',
                                ]
                            ]
                        ]
                    ]
                ],
                'mappings' => [
                    $this->type => [
                        'properties' => [
                            'speciesCommonName' => [
                                'type' => 'string',
                                'analyzer' => 'autocomplete',
                            ],
                            'speciesScientificName' => [
                                'type' => 'string',
                                'analyzer' => 'autocomplete',
                            ],
                            'scanId' => [
                                'type' => 'string',
                                'analyzer' => 'standard', // this may need to change.
                            ],
                            'author' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'museum' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanQuality' => [
                                'type' => 'string',
                                'analyzer' => 'standard', // this may need to change.
                            ],
                            'fileLocation' => [
                                'type' => 'string',
                                'analyzer' => 'standard', // this may need to change.
                            ],
                            'scanTime' => [
                                'type' => 'date',
                            ],
                            'voltage' => [
                                'type' => 'double',
                            ],
                            'imageCount' => [
                                'type' => 'integer',
                            ],
                            'voxelSize' => [
                                'type' => 'integer',
                            ],
                            'averaging' => [
                                'type' => 'integer',
                            ],
                            'current' => [
                                'type' => 'double',
                            ],
                            'timingValue' => [
                                'type' => 'double',
                            ],
                            'imageDirectory' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'sequence' => [
                                'type' => 'integer',
                            ],
                            'images' => [
                                'type' => 'nested',
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->client->indices()->create($params);
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
     * @param array $terms
     *
     * @return array
     */
    public function search(array $terms)
    {
        $params = [
            'index' => env('ES_INDEX'),
            'type' => $this->type,
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' => $terms['keyword'],
                        'fields' => ["speciesCommonName", "speciesScientificName"]
                    ]
                ]
            ]
        ];

        return $this->client->search($params);
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
        $params = [
            'index' => env('ES_INDEX'),
            'type' => $this->type,
            'body' => $doc
        ];

        // Document will be indexed to my_index/my_type/<autogenerated ID>
        return $this->client->index($params);
    }

    /**
     * Insert an array of documents.
     *
     * @param array $docs
     */
    public function insertDocuments(array $docs)
    {
        foreach ($docs as $doc) {
            $params['body'][] = [
                'index' => env('ES_INDEX'),
                'type' => 'dino',
                '_id' => uniqid(),
            ];
            $params['body'][] = $doc;
        }

        return $this->client->bulk($params);
    }
}