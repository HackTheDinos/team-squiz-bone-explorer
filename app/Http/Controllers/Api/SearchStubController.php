<?php

namespace App\Http\Controllers\Api;

use App\ApiResponseFactory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchStubController extends Controller
{
    public function getIndex()
    {
        return ApiResponseFactory::MakeEnvelope([
            ['id' => 1, 'name' => 'Agumon'],
            ['id' => 2, 'name' => 'Baalmon'],
            ['id' => 3, 'name' => 'Baromon'],
            ['id' => 4, 'name' => 'Gaomon'],
            ['id' => 5, 'name' => 'Grademon'],
        ]);
    }
}
