@extends('template')

@section('title')
Tipos de chamado
@endsection

@section('content')

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading clearfix">
        <div class="btn-group pull-left">
          <a href="{{ route('callmodes.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $callmodes->total() }}</h4>
      </div>
      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Titulo</th>
            <th></th>
          </tr>
          @foreach($callmodes as $callmode)
            <tr>
              <td>{{$callmode->id}}</td>
              <td>{{$callmode->created_at}}</td>
              <td>{{$callmode->name}}</td>
              <td><a href="{{ route('callmodes.show',['id'=>$callmode->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a></td>
            </tr>
          @endforeach
      </table>

    </div>

    {!! $callmodes->render() !!}

@endsection
