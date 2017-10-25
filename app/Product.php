<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /***
     * Get the office that owns the product
     */
    public function office()
    {
    	return $this->belongsTo('App\Office');
    }
}
