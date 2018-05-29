<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Lead;
use \Carbon\Carbon;

class Order extends Model 
{
    protected $fillable = [
    	'due_date', 
    	'status', 
    	'comments',
    	'amount',
    ];

    protected $casts = [
    	'comments' => 'array',
    ];

    public function lead() {
    	return $this->hasOne(Lead::class);
    }

    public function getCreatedAtAttribute($date) 
    {
        return Carbon::parse($date)->format('d/m/Y H:i');
    }


    public function getDueDateAttribute($date) 
    {
        return Carbon::parse($date)->format('d/m/Y H:i');
    }

    public function getAmountAttribute($amount) 
    {
        return number_format($amount, 2, ',', '.');
    }
}