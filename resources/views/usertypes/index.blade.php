@extends('template')

@section('title')
Tipos de Usuário
@endsection

@section('content')

  @if(Session::has('created'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Sucesso!</strong> Tipo de usuário criado com sucesso.
    </div>
  @endif
  @if(Session::has('updated'))
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Sucesso!</strong> Tipo de usuário alterado com sucesso.
    </div>
  @endif
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading clearfix">
      <div class="btn-group pull-left">
        <a href="{{ route('usertypes.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
      </div>
      <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $usertypes->total() }}</h4>
    </div>

    <!-- Table -->
    <table class="table table-striped table-condensed">
        <tr>
          <th>Id</th>
          <th>Data</th>
          <th>Nome</th>
          <th>Qtde. Usuários</th>
          <th></th>
        </tr>
        @foreach($usertypes as $usertype)
          <tr>
            <td>{{$usertype->id}}</td>
            <td>{{$usertype->created_at}}</td>
            <td>{{$usertype->name}}</td>
            <td>{{$usertype->users->count()}}</td>
            <td style="text-align: right;"><a href="{{ route('usertypes.show',['id'=>$usertype->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a></td>
          </tr>
        @endforeach
    </table>

  </div>

  <div class="row row-centered" style="text-align: center;">
    {!! $usertypes->render() !!}
  </div>

@endsection
