@extends('template')

@section('title')
Chamado
@endsection

@section('content')

@if(Session::has('created'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Sucesso!</strong> Atendimento registrado com sucesso.
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalhes</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$call->id}} <br/>
    <b>Criado em:</b> {{$call->created_at}}<br/>
    @if(Auth::user()->usertype->administrator == "1")
      <b>Atualizado em:</b> {{$call->updated_at}}<br/>
      <b>Atualizado por:</b> {{$call->user->name}} <br/>
    @endif
    <b>Tipo:</b> {{$call->mode->name}} <br/>
    <b>Secretaria:</b> {{$call->place->Departament->name}} <br/>
    <b>Setor:</b><a href="{{ route('places.show',['id'=>$call->place->id]) }}"> {{$call->place->prefix}} - {{$call->place->name}} </a><br/>
    <b>Solicitante:</b> {{ $call->requester }} <b>E-mail:</b> <a href="mailto:{{ $call->requester_email }}">{{ $call->requester_email }}</a> <b>Chapa:</b> {{ $call->register }}<br/>
    <b>Titulo:</b> {{ $call->title }} <br/>
    <b>Transferências de patrimonio:</b> {{ $call->has_transfers ? 'Sim' : 'Não' }} <br/>
    <b>Descrição:</b>
    <div class="panel panel-default">
      <div class="panel-body">
        {!! $call->description !!}
      </div>
    </div>
    @if($call->files->count() > 0)
      <b>Anexos:</b>
      <div class="panel panel-default">
        <div class="panel-body">
          @foreach($call->files as $file)
            <p><a href="{!! route('calls.file.download',['call'=>$call->id,'file'=>$file->id]) !!}">{!! $file->filename !!}</a></p>
          @endforeach
        </div>
      </div>
    @endif
    @if($call->logs->count() > 1)
      <p><b>Houveram modificações neste registro</b></p>
    @endif
    <a href="{{ route('calls.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
    @if(Auth::user()->usertype->administrator == "1")
      @if($call->history->last()->status->isend == "0")
        <a href="{{ route('calls.edit',['id'=>$call->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
      @endif
    @endif

  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Histórico de atendimento</h3>
  </div>
  <div class="panel-body">

    @if(Auth::user()->usertype->administrator == "1")
      @if($call->history->last()->status->isend == "0")
        <a href="{{ route('calls.history.create', ['id'=>$call->id]) }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Novo atendimento</a><br/><br/>
      @endif
    @endif

    @foreach($call->history->sortByDesc('id') as $history)
        <div class="panel panel-{{ $history->status->color }}">
          <div class="panel-heading">{{ $history->status->name }}</div>
          <div class="panel-body">
            <b>Data:</b> {{$history->created_at}} <br/>
            <b>Responsável:</b> {{ $history->user->name }} <br/>
            <b>Descrição:</b>
            <div class="panel panel-default">
              <div class="panel-body">
                {!! $history->description !!}
              </div>
            </div>
            @if($history->files->count() > 0)
              <b>Anexos:</b>
              <div class="panel panel-default">
                <div class="panel-body">
                  @foreach($history->files as $file)
                    <p><a href="{!! route('calls.history.file.download',['history'=>$history->id,'file'=>$file->id]) !!}">{!! $file->filename !!}</a></p>
                  @endforeach
                </div>
              </div>
            @endif
          </div>
        </div>
    @endforeach
  </div>
</div>

@endsection
