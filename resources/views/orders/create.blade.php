@extends('layouts.default')

@section('content')
	<div class="container-fluid m-t-25">
		<div class="row">
			<div class="col-md-12">
				<div class="overview-wrap">
					<h2 class="title-1">Criar Pedido</h2>
				</div>
			</div>
		</div>


	<div class="card m-t-25 m-b-0">
		<div class="card-header">
			<strong>Novo</strong> Pedido
		</div>
		<form action="{{ url('/pedidos/novo') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="lead_id" value="{{ $lead->id }}">
			<div class="card-body card-block">
				<div class="form-group">
					<label for="description" class=" form-control-label">Cliente</label>
					<input type="text" value="{{ $lead->name }}" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="type" class=" form-control-label">Prazo</label>
					<input type="date" class="form-control">
				</div>
				<div class="form-group">
					<label for="type" class=" form-control-label">Valor</label>
					<input type="text" name="amount" class="form-control money">
				</div>
				<div class="form-group">
					<label for="type" class=" form-control-label">Descrição</label>
					<textarea name="comments" rows="3" placeholder="Descreva o pedido" class="form-control"></textarea>
					{{ $errors->first('comments') }}
				</div>
			</div>
			<div class="card-footer" style="text-align: right">
				<a href="{{ url('potenciais-clientes', ['id' => $lead->id]) }}">
					<button type="button" class="btn btn-default">
						<i class="fa fa-ban"></i> Cancelar
					</button>
				</a>
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-save"></i> Salvar
				</button>
			</div>
		</form>
	</div>

	</div>

@endsection