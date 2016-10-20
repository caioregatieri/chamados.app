@extends('template')

@section('title')
Show user type
@endsection

@section('content')

<br/>
<br/>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalhes</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$usertype->id}} <br/>
    <b>Criado em:</b>  {{$usertype->created_at}}<br/>
    <b>Nome:</b> {{ $usertype->name }} <br/>
    <b>Administrador:</b> {{ $usertype->administrator == 0 ? 'Não' : 'Sim' }} <br/>
    <b>Ver somente seus chamados:</b> {{ $usertype->onlyyourplace == 0 ? 'Não' : 'Sim' }} <br/><br/>
    @if($usertype->logs->count() > 1)
      <b>Houveram modificações neste registro</b>
    @endif
    <br/>
    <a href="{{ route('usertypes.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
    <a href="{{ route('usertypes.edit',['id'=>$usertype->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>

  </div>
</div>

@endsection
