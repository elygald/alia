@extends('layouts.default')

@section('content')
<div class="container-fluid m-t-25">
	<div class="row">
		<div class="col-md-12">
			<div class="overview-wrap">
				<h2 class="title-1">Potenciais Clientes</h2>
              <a href="{{ url('potenciais-clientes/novo') }}" class="au-btn au-btn-icon au-btn--blue">
                  <i class="zmdi zmdi-plus"></i>novo</a>
			</div>
		</div>
	</div>
		<div class="row m-t-25">
			@foreach ($leads as $lead)
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						<div class="mx-auto d-block text-center">
							<img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap">
							<h5 class="text-sm-center mt-2 mb-1">{{ $lead->name }}</h5>
							<div class="location text-sm-center">
								<span class="badge badge-pill {{ trans("lead_status.{$lead->status}.class")}}">{{ trans("lead_status.{$lead->status}.name")}}</span></div>
							</div>
							<hr>
							<div class="card-text text-sm-center">
								<a href="{{ url('potenciais-clientes', ['id' => $lead->id]) }}">Detalhes</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<div class="float-right">
				{{ $leads->links() }}
			</div>
		</div>
@endsection