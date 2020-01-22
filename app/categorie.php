<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = ['name', 'slug'];

    protected $appends = array('image');

    public function getImageAttribute()
    {
        return $this->image()->get()->first();
    }

    //
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function courses()
    {
        return $this->hasMany('App\course');
    }
}
