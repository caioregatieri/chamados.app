@extends('template')

@section('title')
User types
@endsection

@section('content')

  <br/>
  <br/>

  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading clearfix">
      <div class="btn-group pull-left">
        <a href="{{ route('usertypes.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
      </div>
      <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $usertypes->total() }}</h4>
    </div>
    <div class="panel-heading">User types - Total: {{ $usertypes->total() }}</div>

    <!-- Table -->
    <table class="table">
        <tr>
          <th>Id</th>
          <th>Data</th>
          <th>Nome</th>
          <th></th>
        </tr>
        @foreach($usertypes as $usertype)
          <tr>
            <td>{{$usertype->id}}</td>
            <td>{{$usertype->created_at}}</td>
            <td>{{$usertype->name}}</td>
            <td style="text-align: right;"><a href="{{ route('usertypes.show',['id'=>$usertype->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a></td>
          </tr>
        @endforeach
    </table>

  </div>

  <div class="row row-centered" style="text-align: center;">
    {!! $usertypes->render() !!}
  </div>

@endsection
