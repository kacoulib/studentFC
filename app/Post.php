<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // entité propriétaire car elle possède la clé étrangère
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
