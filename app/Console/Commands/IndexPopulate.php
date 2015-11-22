<?php

namespace App\Console\Commands;

use App\Models\Image;
use App\Models\Media;
use App\Search\Search;
use Illuminate\Console\Command;

class IndexPopulate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the search index';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Search $search)
    {
        $this->search = $search;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $media = Media::with('mediaType', 'scan', 'scan.specimen', 'scan.museum', 'scan.author', 'scan.animalGroup')
            ->get()->toArray();

        foreach ($media as $key => $mediaArray) {
            $media[$key] = $this->flattenNested($mediaArray, true);
        }

        $responses = $this->search->insertDocuments($media);

        $images = Image::with('scan', 'scan.specimen', 'scan.museum', 'scan.author', 'scan.animalGroup')
            ->get()->toArray();

        foreach ($images as $key => $image) {
            $images[$key] = $this->flattenNested($image, true);
        }

        $responses = $this->search->insertDocuments($images);
    }

    /**
     * Flatten nested object arrays within an object array
     *
     * @param array $model
     */
    protected function flattenNested(array $objectArray, $recursive = false)
    {
        foreach ($objectArray as $key => $value) {
            if (is_array($value)) {
                unset($objectArray[$key]);
                if ($recursive) {
                    $value = $this->flattenNested($value, $recursive);
                }
                foreach($value as $nestedKey => $nestedValue) {
                    $newKey = $key . ucfirst($nestedKey);
                    $objectArray[$newKey] = $nestedValue;
                }
            }
        }

        return $objectArray;
    }

}
