@extends('template')

@section('title')
Departaments
@endsection

@section('content')

    <div class="panel panel-default">
      <div class="panel-heading">Filtrar e pesquisar</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="search" type="text" class="form-control" placeholder="Nome" />
          </div>
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>Pesquisar</button>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading clearfix">
        <div class="btn-group pull-left">
          <a href="{{ route('departaments.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $departaments->total() }}</h4>
      </div>

      <!-- Table -->
      <table class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Nome</th>
            <th></th>
          </tr>
          @foreach($departaments as $departament)
            <tr>
              <td>{{$departament->id}}</td>
              <td>{{$departament->created_at}}</td>
              <td>{{$departament->name}}</td>
              <td style="text-align: right;"><a href="{{ route('departaments.show',['id'=>$departament->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a></td>
            </tr>
          @endforeach
      </table>

    </div>

    {!! $departaments->render() !!}

@endsection
