<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    public function specimen()
    {
        return $this->belongsTo('App\Models\Specimen', 'specimenId');
    }

    public function museum()
    {
        return $this->belongsTo('App\Models\Museum', 'museumId');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'authorId');
    }

    public function animalGroup()
    {
        return $this->belongsTo('App\Models\AnimalGroup', 'animalGroupId');
    }

    public function media()
    {
        return $this->hasMany('App\Models\Media');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
