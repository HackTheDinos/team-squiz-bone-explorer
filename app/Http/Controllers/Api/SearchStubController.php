<?php

namespace App\Http\Controllers\Api;

use App\ApiResponseFactory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchStubController extends Controller
{
    public function getIndex(Request $request)
    {
        $query = $request->input('q', '');
        $authors = $request->input('authors', []);
        $animalGroups = $request->input('animalGroups', []);
        $museums = $request->input('museums', []);
        $mediaTypes = $request->input('mediaTypes', []);

        return ApiResponseFactory::MakeEnvelope([
            ['id' => 1, 'name' => 'Eusthenopteron foordi', 'thumbnailUrl' => 'http://bone-explorer.dev:3000/img/eusthenopteron_foordi.jpg', 'description' => 'blah blah blah'],
            ['id' => 2, 'name' => 'Iridotriton hechti', 'thumbnailUrl' => 'http://bone-explorer.dev:3000/img/iridotriton_hechti.jpg', 'description' => 'blah blah blah'],
            ['id' => 3, 'name' => 'Sipalocyon sp', 'thumbnailUrl' => 'http://bone-explorer.dev:3000/img/sipalocyon_sp.jpg', 'description' => 'blah blah blah'],
            ['id' => 4, 'name' => 'Teinolophos trusleri', 'thumbnailUrl' => 'http://bone-explorer.dev:3000/img/teinolophos_trusleri.jpg', 'description' => 'blah blah blah'],
        ], [
            'q' => $query
        ]);
    }
}
