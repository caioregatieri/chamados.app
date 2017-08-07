@extends('template')

@section('title')
Usuários
@endsection

@section('content')

    @if(Session::has('created'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sucesso!</strong> Usuário criado com sucesso.
      </div>
    @endif
    @if(Session::has('updated'))
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sucesso!</strong> Usuário alterado com sucesso.
      </div>
    @endif
    <div class="panel panel-default">
      <div class="panel-heading">Filter and search</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="search" type="text" class="form-control" placeholder="Name" />
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading clearfix">
        <div class="btn-group pull-left">
          <a href="{{ route('users.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $users->total() }}</h4>
      </div>

      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Nome</th>
            <th>Setor</th>
            <th>Ult. Login</th>
            <th style="text-align: center;">Bloqueado</th>
            <th></th>
          </tr>
          @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->place->name}} - {{$user->place->departament->name}}</td>
              <td>{{ $user->logins->last() != null ? $user->logins->last()->created_at : '' }}</td>
              <td style="text-align: center;">
                <label class="label label-{{ $user->locked == 0 ? 'primary' : 'danger' }}">{{$user->locked == 0 ? 'Não' : 'Sim'}}</label>
              </td>
              <td style="text-align: right;"><a href="{{ route('users.show',['id'=>$user->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a></td>
            </tr>
          @endforeach
      </table>
    </div>

    <div class="row row-centered" style="text-align: center;">
      {!! $users->render() !!}
    </div>

@endsection
