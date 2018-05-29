<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model 
{
    protected $table = 'integrations';
    public $timestamps = true;
    protected $fillable = [
    	'config'
    ];
}