<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    public function scans()
    {
        $this->hasMany('App\Models\Scan');
    }
}
