@extends('layouts.default')

@section('content')
<div class="container-fluid m-t-25">
  <div class="row">
      <div class="col-md-12">
          <div class="overview-wrap">
              <h2 class="title-1">Perguntas & Respostas</h2>
              <a href="{{ url('perguntas-e-respostas/novo') }}" class="au-btn au-btn-icon au-btn--blue">
                  <i class="zmdi zmdi-plus"></i>novo</a>
              </div>
          </div>
      </div>

      <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Pergunta</th>
                    <th>Resposta</th>
                    <th>Serviço</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($qualificationQuestions as $qualificationQuestion)
                <tr class="tr-shadow">
                    <td>{{ $qualificationQuestion->description }}</td>
                    <td>
                        @if ($qualificationQuestion->type == 0)
                        Texto
                        @else
                        @foreach ($qualificationQuestion->options as $option)
                        <span class="badge badge-pill badge-light">{{ $option }}</span>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        {{ $qualificationQuestion->service->name }}
                    </td>
                    <td>
                        <div class="table-data-feature">
                            <form 
                            action="{{ url('perguntas-e-respostas', ['id' => $qualificationQuestion->id])}}" 
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
    <div style="float:right">
        {{ $qualificationQuestions->links() }}
    </div>
</div>

</div>
@endsection