<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function scan()
    {
        return $this->belongsTo('App\Models\Scan', 'scanId');
    }

    public function mediaType()
    {
        return $this->belongsTo('App\Models\MediaType', 'mediaTypeId');
    }
}
