<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    public $timestamps = false;

    public function scans()
    {
        $this->hasMany('App\Models\Scan');
    }
}
