<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Lead extends Model 
{
    use SoftDeletes;

    protected $fillable = [
        'chat_id',
    	'name', 
    	'contacts',
    	'order_id',
        'service_id',
        'status',
        'comments',
    ];

    protected $casts = [
        'contacts' => 'array',
        'comments' => 'array',
    ];

    public function getCreatedAtAttribute($date) 
    {
    	return Carbon::parse($date)->format('d/m/Y H:i');
    }
}