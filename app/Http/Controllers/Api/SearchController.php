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

        $terms = [];
        $group = false;
        $from = 0;
        $size = 25;

        foreach ($request->all() as $key => $value) {
                if ('q' === $key) {
                    $terms['keyword'] = $value;
                } elseif ('group' === $key) {
                    $group = true;
                } elseif ('from' === $key) {
                    $from = $value;
                } elseif ('size' === $key) {
                    $size = $value;
                } else {
                    $terms['filter'][$key] = strtolower($value);
                }
        }

        $results = $this->search->search($terms, $from, $size, $group);
        return ApiResponseFactory::MakeEnvelope($this->parseResultsToResponse($results));
    }

    protected function parseResultsToResponse(array $results)
    {
        $data = [];

        if (empty($results['hits'])) {
            return [];
        }

        foreach ($results['hits']['hits'] as $key => $result) {
            $data[] = [
                'id' => $result['_id'],
                'maxScore' => $results['hits']['max_score'],
                'score' => $result['_score'],
                'source' => $result['_source'],
            ];
        }

        return $data;
    }
}
