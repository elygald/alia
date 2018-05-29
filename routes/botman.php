<?php
use App\Http\Controllers\BotManController;
use App\Http\Controllers\AliaController;

$botman = resolve('botman');

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('.*', AliaController::class.'@receivedMessage');
