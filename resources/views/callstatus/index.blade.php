@extends('template')

@section('title')
Call status
@endsection

@section('content')

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading clearfix">
        <div class="btn-group pull-left">
          <a href="{{ route('callstatus.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $callstatuses->total() }}</h4>
      </div>

      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
          @foreach($callstatuses as $callstatus)
            <tr>
              <td>{{$callstatus->id}}</td>
              <td>{{$callstatus->created_at}}</td>
              <td>{{$callstatus->name}}</td>
              <td><a href="{{ route('callstatus.show',['id'=>$callstatus->id])}}" class="btn btn-default">View</a></td>
            </tr>
          @endforeach
      </table>

    </div>

    {!! $callstatuses->render() !!}

@endsection
