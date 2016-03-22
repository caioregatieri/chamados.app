@extends('template')

@section('title')
Call status
@endsection

@section('content')

    <a href="{{ route('callstatus.create')}}" class="btn btn-success">Create new call mode</a>
    <br/>
    <br/>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Call status - Total: {{ $callstatuses->total() }}</div>

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
