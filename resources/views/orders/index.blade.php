@extends('layouts.default')

@section('content')
<div class="container-fluid m-t-25">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1">Pedidos</h2>
      </div>
    </div>
  </div>

  <div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
      <thead>
        <tr>
          <th>Cliente</th>
          <th>Prazo</th>
          <th>Valor</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($orders as $order)
        <tr class="tr-shadow">
         <td>
           {{ $order->lead->name or 'Desconhecido' }} 
         </td>
         <td>
          {{ $order->due_date }}
        </td>
        <td>
          {{ $order->amount }}
        </td>
        <td>
          <span class="badge badge-pill {{ trans("order_status.{$order->status}.class")}}">{{ trans("order_status.{$order->status}.name")}}</span>
        </td>
        <td class="text-right">

          <a class="item" href="{{ url('/pedidos', ['id' => $order->id]) }}">
            <i class="zmdi zmdi-eye"></i>
          </a>
        </td>
      </tr>
      <tr class="spacer"></tr>
      @empty
      <td colspan="5">Nenhum registro encontrado.</td>
      @endforelse
    </tbody>
  </table>
  <div style="float:right">
    {{ $orders->links() }}
  </div>
</div>

</div>
@endsection