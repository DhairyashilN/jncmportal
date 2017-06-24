<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerenquiry extends Model
{
   /**
	* Table to store information.	
	**/
	protected $table = 'enquiries';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['customer_name','address','contact1','contact2','email','enquiry_date','enquiry_time'];
}
