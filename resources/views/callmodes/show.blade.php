@extends('template')

@section('title')
Tipo de chamado
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalhes</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{ $callmode->id}} <br/>
    <b>Criado em:</b>  {{ $callmode->created_at}}<br/>
    <b>Titulo:</b> {{ $callmode->name }} <br/>
    @if($callmode->logs->count() > 1)
      <b>Houveram modificações neste registro</b>
    @endif
    <br/>
    <br/>
    
    <a href="{{ route('callmodes.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
    <a href="{{ route('callmodes.edit',['id'=>$callmode->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>

    <br/>
    <br/>

    <h4>Responsáveis por esse tipo de atendimento</h4>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading clearfix">
          <div class="btn-group pull-left">
            <a href="javascript: void(0);"  id="btn-add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
          </div>
          <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: </h4>
        </div>
        <table class="table table-sm table-responsible">
            <tr>
              <th>Nome</th>
              <th>Secretária</th>
              <th>Setor</th>
              <th></th>
            </tr>
            @foreach($callmode->responsibles as $responsible)
            <tr>
              <td style="line-height: 26px;">{{ $responsible->name }}</td>
              <td style="line-height: 26px;">{{ $responsible->place->departament->name }}</td>
              <td style="line-height: 26px;">{{ $responsible->place->name }}</td>
              <td style="text-align: right;">
                  {!! Form::open(['route'=>['callmodes.delresponsible', 'id'=>$callmode->id], 'method'=>'post' ]) !!}
                  <input type="hidden" name="user_id" value="{{ $responsible->id }}">
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Remover</button>
              {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
        </table>
    </div>

  </div>
</div>

@include('callmodes._modalAddResponsibles')

@endsection


@section('scripts')

<script>
  $('#btn-add').on('click', function(){
    $('#myModal').modal();
  })
</script>

@endsection