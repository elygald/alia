@extends('layouts.default')

@section('content')
<div class="container-fluid m-t-25">
	<div class="row">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1">Serviços</h2>
			</div>
		</div>
	</div>

	<div class="card m-t-25 m-b-0">
		<div class="card-header">
			<strong>Novo</strong> Serviço
		</div>
		<form action="{{ url('servicos/novo') }}" method="post">
			{{ csrf_field() }}
			<div class="card-body card-block">
				<div class="form-group">
					<label for="name" class=" form-control-label">Nome</label>
					<input type="text" name="name" class="form-control" required>
				</div>
			</div>
			<div class="card-footer" style="text-align: right">
				<a href="{{ url('servicos') }}">
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
