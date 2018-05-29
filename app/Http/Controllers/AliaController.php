<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use App\Service;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Conversations\GreetingConversation;

class AliaController extends Controller
{
    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function receivedMessage(BotMan $bot)
    {
        $bot->startConversation(new GreetingConversation());
    }
}
