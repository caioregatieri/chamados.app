@extends('template')

@section('title')
Secretarias
@endsection

@section('content')

    @if(Session::has('created'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sucesso!</strong> Secretaria criada com sucesso.
      </div>
    @endif
    @if(Session::has('updated'))
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sucesso!</strong> Secretaria alterada com sucesso.
      </div>
    @endif
    <div class="panel panel-default">
      <div class="panel-heading">Filtrar e pesquisar</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="search" type="text" class="form-control" placeholder="Nome" />
          </div>
          <div class="form-group">
            <select class="form-control" name="departament">
              <option value="" disabled selected>Secretaria</option>
              @foreach($departaments as $departament)
                <option value="{{ $departament->id }}">{{ $departament->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Pesquisar</button>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading clearfix">
        <div class="btn-group pull-left">
          <a href="{{ route('places.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $places->total() }}</h4>
      </div>

      <!-- Table -->
      <table class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Região</th>
            <th>Secretaria</th>
            <th>Setor</th>
            <th>Telefone</th>
            <th></th>
          </tr>
          @foreach($places as $place)
            <tr>
              <td>{{$place->id}}</td>
              <td>{{$place->created_at}}</td>
              <td>{{$place->region}}</td>
              <td>{{$place->Departament->name}}</td>
              <td>{{$place->prefix}} - {{$place->name}}</td>
              <td>{{$place->telephone1}}</td>
              <td><a href="{{ route('places.show',['id'=>$place->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a></td>
            </tr>
          @endforeach
      </table>
    </div>

    <div class="row row-centered" style="text-align: center;">
      {!! $places->render() !!}  
    </div>

@endsection
