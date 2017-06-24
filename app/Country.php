<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
	* Table to store information.	
	**/
	protected $table = 'countries';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['shortname','name','phonecode'];
}
