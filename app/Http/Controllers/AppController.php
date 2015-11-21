<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AppController extends Controller
{
    /**
     * Display AngularJS App.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('app');
    }
}
