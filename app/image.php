<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    //
    /**
     * Get the owning imageable model.
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
