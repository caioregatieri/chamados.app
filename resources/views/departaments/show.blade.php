@extends('template')

@section('title')
Show place
@endsection

@section('content')

<br/>
<br/>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalhes</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$departament->id}} <br/>
    <b>Criado em:</b>  {{$departament->created_at}}<br/>
    <b>Nome:</b> {{ $departament->name }} <br/>
    @if($departament->logs->count() > 1)
      <b>Houveram modificações neste registro</b>
    @endif
    <br/>
    <a href="{{ route('departaments.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
    <a href="{{ route('departaments.edit',['id'=>$departament->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>

  </div>
</div>

@endsection
