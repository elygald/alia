@extends('layouts.default')

@section('content')

<div class="container-fluid m-t-25">
	<div class="row">
		<div class="col-md-9 mx-auto">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">Pedido #{{ $order->id }}</strong> 
					<span class="badge float-right badge-pill {{ trans("order_status.{$order->status}.class")}}">{{ trans("order_status.{$order->status}.name")}}</span>
				</div>
				<div class="card-body">
					<strong>Cliente:</strong> <a href="{{ url('potenciais-clientes', ['id' => $order->lead->id]) }}">{{ $order->lead->name or 'Não Definido' }}</a>
					<hr>
					<strong>Data:</strong> {{ $order->created_at }}
					<hr>
					<strong>Prazo:</strong> {{ $order->due_date or 'Não Definido' }}
					<hr>
					<strong>Valor:</strong> {{ $order->amount or 'Não Definido' }}
					<hr>
					<strong>Descrição:</strong> {{ $order->comments[0] }}
				</div>
			</div>
		</div>
	</div>
	
	@if ($order->status !== 1)
	<div class="row">
		<div class="col-md-9 mx-auto text-right">
			<form action="{{ url('pedidos/fechar', ['id' => $order->id]) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<button type="submit" onclick="return confirm('Deseja confirmar esta ação');" class="btn btn-success">Fechar Pedido</button>
			</form>
		</div>
	</div>
	@endif
</div>
@endsection