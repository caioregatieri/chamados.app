@extends('template')

@section('title')
Show User
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalhes</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$user->id}} <br/>
    <b>Criado:</b>  {{$user->created_at}}<br/>
    <b>Nome:</b> {{ $user->name }} <br/>
    <b>Tipo:</b> {{ $user->usertype->name }} <br/>
    <b>Secretaria:</b> {{ $user->place->departament->name }} <br/>
    <b>Setor:</b> {{ $user->place->prefix }} {{ $user->place->name }} <br/>
    <b>Chapa:</b> {{ $user->register }} <br/>
    <b>E-mail:</b> {{ $user->email }} <br/>
    <b>Bloqueado:</b> {{ $user->locked == 0 ? 'Não' : 'Sim' }}
    @if($user->logs->count() > 1)
      <br/><b>Houveram modificações neste usuário</b>
    @endif
    <br/><br/>
    <a href="{{ route('users.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
    <a href="{{ route('users.edit',['id'=>$user->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>

  </div>
</div>

@endsection
