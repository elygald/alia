<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Service;
use App\ValueObjects\QuestionType;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class QualificationQuestion extends Model 
{
    use SoftDeletes;


    protected $casts = [
        'options' => 'array',
    ];
    
    protected $dates = [
    	'deleted_at'
    ];

    protected $fillable = [
    	'description', 
    	'type', 
    	'options',
    	'order',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class)->withTrashed();
    }

    public function getButtons()
    {
        if ($this->type == QuestionType::TEXT) {
            return [];
        }

        $buttons = [];

        foreach ($this->options as $option) {
            $buttons[] = Button::create($option)->value($option);
        }

        return $buttons;
    }
}