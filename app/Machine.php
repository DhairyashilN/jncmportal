<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
	/**
	* Table to store information.	
	**/
	protected $table = 'machinery';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['machine_name'];

 }
