@extends('layouts.default')

@section('content')
<div class="container-fluid m-t-25">
  <div class="row">
      <div class="col-md-12">
          <div class="overview-wrap">
              <h2 class="title-1">Serviços</h2>
              <a href="{{ url('/servicos/novo') }}" class="au-btn au-btn-icon au-btn--blue">
                  <i class="zmdi zmdi-plus"></i>novo</a>
              </div>
          </div>
      </div>

      <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                <tr class="tr-shadow">
                    <td>{{ $service->id }}</td>
                    <td>
                      	{{ $service->name }}
                    </td>
                    <td>
                        <div class="table-data-feature">
                            <form
                            action="{{ url('servicos', ['id' => $service->id])}}"
                            method="POST"
                            >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('Deseja confirmar esta ação?')" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remover">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <tr class="spacer"></tr>
            @empty
              <tr>
                <td colspan="3">Nenhum registro encontrado.</td>
              </tr>
            @endforelse
        </tbody>
    </table>
</div>

</div>
@endsection
