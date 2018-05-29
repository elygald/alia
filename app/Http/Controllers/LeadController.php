<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Answer;
use App\Http\Requests\Leads\StoreRequest;
use App\ValueObjects\LeadStatus;

class LeadController extends Controller
{
    public function index()
    {
    	$leads = Lead::orderBy('id', 'desc')->paginate(20);

    	return view('leads.index', [
    		'leads' => $leads
    	]);
    }

    public function show($id)
    {
    	$lead = Lead::find($id);
        $answers = Answer::where('lead_id', $id)->with('qualificationQuestion')->get();

    	return view('leads.show', [
    		'lead' => $lead,
            'answers' => $answers,
    	]);
    }

    public function create() 
    {
        return view('leads.create');
    }

    public function updateStatus($id, Request $request)
    {
        $lead = Lead::find($id);
        $lead->status = $request->get('status');

        if ($lead->save()) {
            return redirect()->back()->with([
                'message_type' => 'success',
                'message_content' => 'Status atualizado com sucesso'
            ]);
        }

        return redirect()->back()->with([
            'message_type' => 'error',
            'message_content' => 'Falha ao atualizar status'
        ]);
    }

    public function store(StoreRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'contacts' => [
                [
                    'mean_of_contact' => $request->get('mean_of_contact'),
                    'value' => $request->get('value'),
                ]
            ],
            'status' => LeadStatus::WAITING_CONTACT,
            'comments' => [],
        ];
        
        $lead = Lead::create($data);

        if ($lead) {
            return redirect("potenciais-clientes/{$lead->id}")->with([
                'message_type' => 'success',
                'message_content' => 'Potencial Cliente criado com sucesso'
            ]);
        }

        return redirect()->back()->with([
            'message_type' => 'error',
            'message_content' => 'Falha ao criar potencial cliente'
        ]);
    }
}
