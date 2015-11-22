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
                            'created_at' => [
                                'type' => 'date',
                            ],
                            'updated_at' => [
                                'type' => 'date',
                            ],
                            'filePath' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'filePath' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'fileName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'fileUrl' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanId' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'mediaTypeId' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'media_typeId' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'mediaTypeName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanCreated_at' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanUpdated_at' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanScanId' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanScanQuality' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanFileDirectory' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanLocation' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanScanTime' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanVoltage' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanVoxelSize' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanImageCount' => [
                                'type' => 'integer',
                            ],
                            'scanCurrent' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanSequence' => [
                                'type' => 'integer',
                            ],
                            'mediaTypeName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'mediaTypeName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanSpecimenId' => [
                                'type' => 'integer',
                            ],
                            'scanMuseumId' => [
                                'type' => 'integer',
                            ],
                            'scanAuthorId' => [
                                'type' => 'integer',
                                'analyzer' => 'standard',
                            ],
                            'scanAnimalGroupId' => [
                                'type' => 'integer',
                            ],
                            'scanSpecimenCreated_at' => [
                                'type' => 'date',
                            ],
                            'scanSpecimenUpdated_at' => [
                                'type' => 'date',
                            ],
                            'scanSpecimenSpecimenNumber' => [
                                'type' => 'integer',
                            ],
                            'scanSpecimenSpeciesCommonName' => [
                                'type' => 'string',
                                'analyzer' => 'autocomplete',
                            ],
                            'scanSpecimenSpeciesScientificName' => [
                                'type' => 'string',
                                'analyzer' => 'autocomplete',
                            ],
                            'scanMuseumName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanAuthorName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'scanAnimal_grouId' => [
                                'type' => 'integer',
                            ],
                            'scanAnimal_groupName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
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
                        'fields' => ["scanSpecimenSpeciesCommonName", "scanSpecimenSpeciesScientificName"]
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
            'body' => [ 'scanSpecimenSpeciesCommonName' => 'Oviraptorid', 'scanSpecimenSpeciesScientificName' => 'Citipati osmolskae']
        ];

        // Document will be indexed to my_index/my_type/<autogenerated ID>
        $result = $this->client->index($params);
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