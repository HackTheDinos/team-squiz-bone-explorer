<?php

namespace App\Http\Controllers\Api;

use App\ApiResponseFactory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Search\Search;

class SearchController extends Controller
{
    /** @var Search  */
    private $search;

    public function __construct(Search $search)
    {
        $this->search = $search;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $terms = ['keyword' => [], 'filter' => []];

        foreach ($request->all() as $key => $value) {
                if ('q' === $key) {
                        $terms['keyword'] = $value;
                } else {
                        $terms['filter'][$key] = strtolower($value);
                }
        }

        $results = $this->search->search($terms);
        return ApiResponseFactory::MakeEnvelope($this->parseResultsToResponse($results));
    }

    protected function parseResultsToResponse(array $results)
    {
        $data = [];

        if (empty($results['hits'])) {
            return [];
        }

        foreach ($results['hits']['hits'] as $result) {
            $data[] = [
                'id' => $result['_id'],
                'source' => $result['_source']
            ];
        }

        return $data;
    }
}
