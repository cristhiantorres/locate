<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /***
	 * Get the offices for the businesses
     */
    public function offices()
    {
    	return $this->hasMany('App\Office');
    }

    /***
	 * Get the user for the business
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
