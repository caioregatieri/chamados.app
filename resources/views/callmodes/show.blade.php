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
    <a href="{{ route('callmodes.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
    <a href="{{ route('callmodes.edit',['id'=>$callmode->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>

  </div>
</div>

@endsection
