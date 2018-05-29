<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\Services\StoreRequest;

class ServicesController extends Controller
{
    public function index()
    {
      $services = Service::orderBy('name')->paginate(20);

    	return view('services.index', [
    		'services' => $services
    	]);
    }

    public function new()
    {
    	return view('services.new');
    }

    public function store(StoreRequest $request)
    {

    	$services = new Service([
    		'name' => $request->get('name')
  	  ]);

    	if ($services->save()) {
    		return redirect('/servicos')->with([
    			'message_type' => 'success',
    			'message_content' => 'Serviço salvo com sucesso',
    		]);
    	}

		return redirect()->back()->with([
			'message_type' => 'danger',
			'message_content' => 'Erro ao salvar Serviço',
		]);
    }

    public function destroy(int $id)
    {
        if (Service::find($id)->delete()) {
            return redirect('/servicos')->with([
                'message_type' => 'success',
                'message_content' => 'Serviço removido com sucesso',
            ]);
        }

        return redirect()->back()->with([
            'message_type' => 'danger',
            'message_content' => 'Falha ao salvar Serviço',
        ]);
    }
}
