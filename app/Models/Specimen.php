<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specimen extends Model
{
    public function scans()
    {
        $this->hasMany('App\Models\Scan');
    }
}
