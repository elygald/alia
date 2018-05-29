<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Service;
use App\QualificationQuestion;
use App\ValueObjects\LeadStatus;
use App\Lead;
use App\Answer as AnswerModel;
use App\ValueObjects\QuestionType;
class GreetingConversation extends Conversation
{
    protected $contact;

    protected $questions;

    /**
     * First question
     */
    public function askService()
    {
        $services = Service::all();

        $buttons = [];

        foreach ($services as $key => $service) {
            $buttons[] = Button::create($service->name)->value($service->name);
        }

        $buttons[] = Button::create('Ajuda')->value('Ajuda');
        
        $question = Question::create("Olá, como posso ajuda-lo?")
            ->addButtons($buttons);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'Ajuda') {
                    $this->say('Deixe sua dúvida, lhe responderemos o mais breve possível!');
                } else {
                    $this->questions = QualificationQuestion::orderBy('order')
                        ->whereHas('service', function($q) use ($answer) {
                            $q->where('name', $answer->getValue());
                        })
                        ->get();
                    
                    $lead = Lead::updateOrCreate(
                        [
                            'chat_id' => $this->bot->getUser()->getId(),
                        ],
                        [
                            'name' => "{$this->bot->getUser()->getFirstName()} {$this->bot->getUser()->getLastName()}",
                            'status' => LeadStatus::WAITING_CONTACT,
                            'contacts' => [],
                            'comments' => [],
                        ]
                    );

                    $this->askCustomerQuestions(0, $lead);
                }
            }
        });
    }

    public function askCustomerQuestions(int $questionIndex, Lead $lead)
    {
        $qualificationQuestion = $this->questions->get($questionIndex);

        if ($qualificationQuestion) {
            $question = Question::create($qualificationQuestion->description);

            if ($qualificationQuestion->type == QuestionType::OPTIONS) {
                $question->addButtons($qualificationQuestion->getButtons());
            }

            $this->ask($question, function (Answer $answer) use ($qualificationQuestion, $questionIndex, $lead) {
                    AnswerModel::updateOrCreate(
                        [
                        'lead_id' => $lead->id,
                        'qualification_question_id' => $qualificationQuestion->id,
                        ],
                        [
                            'value' => $answer->getValue()
                        ]
                    );

                    return $this->askCustomerQuestions($questionIndex + 1, $lead);
            });

            return;
        }

        $this->say('Obrigado pelas respostas, em breve um vendedor entrará em contato!');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askService();
    }
}
