<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // entité propriétaire car elle possède la clé étrangère
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPublishedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function media()
    {
        return $this->hasOne('App\Media');
    }

}
