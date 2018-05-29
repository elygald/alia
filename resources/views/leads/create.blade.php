@extends('layouts.default')

@section('content')
	<div class="container-fluid m-t-25">
		<div class="row">
			<div class="col-md-12">
				<div class="overview-wrap">
					<h2 class="title-1">Criar Potencial Cliente</h2>
				</div>
			</div>
		</div>


	<div class="card m-t-25 m-b-0">
		<div class="card-header">
			<strong>Novo</strong> Potencial Cliente
		</div>
		<form action="{{ url('/potenciais-clientes/novo') }}" method="post">
			{{ csrf_field() }}
			<div class="card-body card-block">
				<div class="form-group">
					<label for="type" class=" form-control-label">Nome</label>
					<input type="text" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="type" class=" form-control-label">Meio de Contato</label>
					<select name="mean_of_contact" class="form-control" required>
						<option value="0">{{ trans('contact_type.0') }}</option>
						<option value="1">{{ trans('contact_type.1') }}</option>
						<option value="2">{{ trans('contact_type.2') }}</option>
						<option value="3">{{ trans('contact_type.3') }}</option>
					</select>
				</div>
				<div class="form-group">
					<label for="type" class=" form-control-label">Contato</label>
					<input type="text" name="value" class="form-control"  required>
				</div>
			</div>
			<div class="card-footer" style="text-align: right">
				<a href="#">
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