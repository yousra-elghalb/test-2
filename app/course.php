<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'categorie_id'];

    protected $appends = array('image', 'categorie');

    public function getImageAttribute()
    {
        return $this->image()->get()->first();
    }

    public function getCategorieAttribute()
    {
        return $this->categorie()->get()->first();
    }

    //
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function categorie()
    {
        return $this->belongsTo('App\categorie');
    }
}
