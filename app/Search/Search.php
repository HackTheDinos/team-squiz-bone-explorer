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
//        $this->client->indices()->delete(['index' => env('ES_INDEX')]);
        $params = [
            'index' => env('ES_INDEX'),
            'body' => [
                'settings' => [
                    'number_of_shards' => 1,
                    'number_of_replicas' => 0,
                ],
                'mappings' => [
                    'dino' => [
                        'properties' => [
                            'speciesCommonName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
                            ],
                            'speciesScientificName' => [
                                'type' => 'string',
                                'analyzer' => 'standard',
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

//        Specimen Number
//Species Common Name
//Species Scientific Name
//Scan ID
//Group
//Museum
//Author
//Scan Quality
//File location
//When scan was taken
//KiloVolts (KV) - voltage when ct was taken
//Who scanned it (author?)
//Voxel size
//Number of images
//Averaging (calibration - number of images to take and average image values)
//Skip (averaging plus skip is total number of images)
//Timing value
//Current
//sequence
//image directory
//Image
//filename1
//filename2
//filename3
//filename4




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