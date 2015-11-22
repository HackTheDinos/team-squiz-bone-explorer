<?php

namespace App\Http\Controllers\Api;

use App\Models\AnimalGroup;
use App\ApiResponseFactory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnimalGroupController extends Controller
{
    public function getIndex()
    {
        return ApiResponseFactory::MakeEnvelope(AnimalGroup::orderBy('name', 'asc')->get()->toArray());
    }
}
