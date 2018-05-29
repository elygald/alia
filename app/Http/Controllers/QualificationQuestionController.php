<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QualificationQuestion;
use App\Http\Requests\QualificationQuestion\StoreRequest;
use App\Service;

class QualificationQuestionController extends Controller
{
    public function index()
    {
    	$qualificationQuestions = QualificationQuestion::orderBy('order')->paginate(20);
    	
    	return view('qualification_questions.index', [
    		'qualificationQuestions' => $qualificationQuestions
    	]);
    }

    public function new()
    {
        $services = Service::all();
        $payload = [
            'services' => $services
        ];

        if ($services->count() === 0) {
            $payload = [
                'need_services' => 'É necessário cadastra um serviço antes de cadastrar perguntas!',
                'services' => $services
            ];
        }

    	return view('qualification_questions.new', $payload);
    }

    public function store(StoreRequest $request)
    {	
    	$qualificationQuestion = new QualificationQuestion([
    		'description' => $request->get('description'),
    		'type' => $request->get('type'),
    		'options' => json_decode($request->get('options')) ?? [],
    		'order' => QualificationQuestion::count(),
            'service_id' => $request->get('service_id'),
    	]);

    	if ($qualificationQuestion->save()) {
    		return redirect('/perguntas-e-respostas')->with([
    			'message_type' => 'success',
    			'message_content' => 'Pergunta salva com sucesso',
    		]);
    	}

		return redirect()->back()->with([
			'message_type' => 'danger',
			'message_content' => 'Erro ao salvar pergunta',
		]);
    }

    public function destroy(int $id)
    {
        if (QualificationQuestion::find($id)->delete()) {
            return redirect('/perguntas-e-respostas')->with([
                'message_type' => 'success',
                'message_content' => 'Pergunta removida com sucesso',
            ]);
        }

        return redirect()->back()->with([
            'message_type' => 'danger',
            'message_content' => 'Falha ao salvar pergunta',
        ]);
    }
}
