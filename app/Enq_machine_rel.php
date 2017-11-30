<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enq_machine_rel extends Model
{
    /**
	* Table to store information.	
	**/
	protected $table = 'enq_machine_rels';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['enquiry_id','machine_id'];
 }
