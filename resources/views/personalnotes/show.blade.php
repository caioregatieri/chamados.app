@extends('template')

@section('title')
  Nota pessoal
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalhes</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$note->id}} <br/>
    <b>Criado:</b>  {{$note->created_at}} <br/>
    <b>Titulo:</b> {{$note->title}} <br/>
    <b>Descrição:</b>
    <div class="panel panel-default">
      <div class="panel-body">
        {!! $notes->description !!}
      </div>
    </div>
    @if($notes->logs->count() > 1)
      <br/><b>Houveram modificações neste lembrete</b>
    @endif
    <br/><br/>
    <a href="{{ route('personalnotes.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
    <a href="{{ route('personalnotes.edit',['id'=>$note->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>

  </div>
</div>

@endsection
