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
        foreach ($request->all() as $key => $value) {
            if ('q' === $key) {
                // Fuzzy search.
            }
            else {
                // Faceted search
            }
        }
    }
}
