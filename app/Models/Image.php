<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function scan()
    {
        return $this->belongsTo('App\Models\Scan', 'scanId');
    }
}
