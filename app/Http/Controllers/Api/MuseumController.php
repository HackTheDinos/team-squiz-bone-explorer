<?php

namespace App\Http\Controllers\Api;

use App\ApiResponseFactory;
use App\Museum;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MuseumController extends Controller
{
    public function index()
    {
        return ApiResponseFactory::MakeEnvelope(Museum::orderBy('name', 'asc')->get()->toArray());
    }
}
