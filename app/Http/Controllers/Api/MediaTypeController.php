<?php

namespace App\Http\Controllers\Api;

use App\ApiResponseFactory;
use App\MediaType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MediaTypeController extends Controller
{
    public function getIndex()
    {
        return ApiResponseFactory::MakeEnvelope(MediaType::orderBy('name', 'asc')->get()->toArray());
    }
}
