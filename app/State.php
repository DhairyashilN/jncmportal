<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
	* Table to store information.	
	**/
	protected $table = 'states';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','country_id'];
}