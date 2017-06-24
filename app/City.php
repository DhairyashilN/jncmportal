<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
	* Table to store information.	
	**/
	protected $table = 'cities';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','state_id'];
}
