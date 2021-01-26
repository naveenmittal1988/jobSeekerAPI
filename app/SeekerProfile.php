<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerProfile extends Model
{
    protected $fillable=[
    	'name','mobile','email','title','location','description'
    	];
}
