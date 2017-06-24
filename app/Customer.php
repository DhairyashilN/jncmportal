<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
	* Table to store information.	
	**/
	protected $table = 'customers';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['customer_name','address','city','district','state','country','contact','email','machine','quantity','purchase_date','purchase_year'];
}
