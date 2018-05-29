<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QualificationQuestion;

class Answer extends Model 
{
    protected $fillable = [
    	'lead_id', 
    	'qualification_question_id',
    	'value'
    ];

    public function qualificationQuestion()
    {
    	return $this->belongsTo(QualificationQuestion::class);
    }
}