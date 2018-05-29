@extends('layouts.default')

@section('content')
<div class="container-fluid m-t-25">
	<div class="row">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1">Perguntas & Respostas</h2>
			</div>
		</div>
	</div>

	<div class="card m-t-25 m-b-0">
		<div class="card-header">
			<strong>Nova</strong> Pergunta
		</div>
		@if (isset($need_services))
			<div class="alert alert-warning">
				{{ $need_services }}
			</div>
		@endif
		<form action="{{ url('/perguntas-e-respostas/novo') }}" method="post">
			{{ csrf_field() }}
			<div class="card-body card-block">
				<div class="form-group">
					<label for="service_id" class=" form-control-label">Serviço</label>
					<select type="text" name="service_id" class="form-control" required>
						@foreach($services as $service)
							<option value="{{ $service->id }}">{{ $service->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="description" class=" form-control-label">Descrição</label>
					<input type="text" name="description" placeholder="Qual a sua cor preferida?" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="type" class=" form-control-label">Tipo da Resposta</label>
					<select name="type" id="type-selector" class="form-control" required>
						<option value="0">Texto</option>
						<option value="1">Opções</option>
					</select>
				</div>
				<input type="hidden" name="options">
				<div class="form-group" id="options-form" style="display: none">
					<label class=" form-control-label">Opções</label>
					<input type="text" id="tags" class="form-control">
					<span class="help-block">Separe por vírgulas.</span>
				</div>
			</div>
			<div class="card-footer" style="text-align: right">
				<a href="{{ url('perguntas-e-respostas') }}">
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

@push('scripts')
<script>
	$(document).ready(function() {
		$("#type-selector").change(function() {
			if ($(this).val() == '1') {
				$('#options-form').show();
				return;
			}

			$('#options-form').hide();
			$('input[name=options]').val('');

		});

		$('#tags').tagsInput({
			'width': '100%',
			'defaultText': '',
			'onChange': function(e) {
				var options = e.val().split(',');
				$('input[name=options]').val(JSON.stringify(options));
			}
		});
	})
</script>
@endpush