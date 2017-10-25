<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    /***
     * Get the business that owns the office
     */
    public function business()
    {
    	return $this->belongsTo('App\Business');
    }

    /***
     * Get the products that owns the office
     */
    public function products()
    {
    	return $this->hasMany('App\Product');
    }

}
