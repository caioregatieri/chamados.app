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
      <div class="panel-heading">Filtrar e pesquisar</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="name" type="text" class="form-control" placeholder="Nome" />
          </div>
          <div class="form-group">
            <select name="usertype_id" class="form-control">
            <option value="" disabled selected>Tipo</option>
              @foreach($usertypes as $type)
              <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="locked">
              <option value="" disabled selected>Bloqueado</option>
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select>
          </div>
          <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>
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
      <table class="table table-striped table-condensed">
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
              <td style="text-align: right;"><a href="{{ route('users.show',['id'=>$user->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a></td>
            </tr>
          @endforeach
      </table>
    </div>

    <div class="row row-centered" style="text-align: center;">
      {!! $users->render() !!}
    </div>

@endsection
