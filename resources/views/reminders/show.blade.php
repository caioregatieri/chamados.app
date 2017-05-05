@extends('template')

@section('title')
Lembrete
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalhes</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$reminder->id}} <br/>
    <b>Criado:</b>  {{$reminder->created_at}} <br/>
    <b>Por: </b> {{$reminder->user->name}}<br/>
    <b>Titulo:</b> {{$reminder->title}} <br/>
    <b>Descrição:</b>
    <div class="panel panel-default">
      <div class="panel-body">
        {!! $reminder->description !!}
      </div>
    </div>
    @if($reminder->logs->count() > 1)
      <br/><b>Houveram modificações neste lembrete</b>
    @endif
    <br/><br/>
    <a href="{{ route('reminders.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
    <a href="{{ route('reminders.edit',['id'=>$reminder->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>

  </div>
</div>

@endsection
