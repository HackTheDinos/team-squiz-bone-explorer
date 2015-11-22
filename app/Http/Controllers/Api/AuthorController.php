<?php

namespace App\Http\Controllers\Api;

use App\ApiResponseFactory;
use App\Author;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function getIndex()
    {
        return ApiResponseFactory::MakeEnvelope(Author::orderBy('name', 'asc')->get()->toArray());
    }
}
