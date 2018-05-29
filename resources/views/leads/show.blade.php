@extends('layouts.default')

@section('content')
<div class="card-header ">
	<div class="media">
		<a href="#">
			<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ asset('images/icon/avatar-01.jpg') }}">
		</a>
		<div class="media-body">
			<h2 class="t display-6">{{ $lead->name }}</h2>
			<span class="badge badge-pill {{ trans("lead_status.{$lead->status}.class")}}">{{ trans("lead_status.{$lead->status}.name")}}</span>
			<br>
			<small>Captado em {{ $lead->created_at }}</small><br>
			@if(isset($lead->contacts[0]))
				<small>Entrar em contato por {{ trans("contact_type.{$lead->contacts[0]['mean_of_contact']}") }}: {{ $lead->contacts[0]['value'] }}</small>
			@endif
		</div>
	</div>
</div>

<div class="container-fluid m-t-25">
	<div class="row">
		<div class="col-md-9 mx-auto">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">Qualificação</strong>
				</div>
				<div class="card-body">
					@forelse ($answers as $answer)
						<div class="m-b-10">
							<b>{{ $answer->qualificationQuestion->description }}</b>
							<p class="card-text">
								{{ $answer->value }}
							</p>
						</div>
						<hr>
					@empty
						Nenhuma resposta cadastrada
					@endforelse
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9 mx-auto text-right">
			@if ($lead->order_id === null)
			<button class="btn btn-light" data-toggle="modal" data-target="#change-status-modal">Alterar Status</button>
			<a href="{{ url('pedidos/novo', ['leadId' => $lead->id]) }}" class="btn btn-success">Gerar Pedido</a>
			@else
			<a href="{{ url('pedidos', ['id' => $lead->order_id]) }}" class="btn btn-success">Ver Pedido</a>
			@endif
		</div>
	</div>
</div>

<div class="modal fade" id="change-status-modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mediumModalLabel">Alterar Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('potenciais-clientes/atualizar-status', ['id' => $lead->id]) }}" method="PUT">
				<div class="modal-body">
					<select name="status" class="form-control" name='status'>
						<option value="0">Aguardando Contato</option>
						<option value="1">Aguardando Resposta</option>
						<option value="2">Venda Perdida</option>
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection