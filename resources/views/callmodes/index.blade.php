@extends('template')

@section('title')
Departaments
@endsection

@section('content')

    <a href="{{ route('callmodes.create')}}" class="btn btn-success">Create new call mode</a>
    <br/>
    <br/>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">callmodes - Total: {{ $callmodes->total() }}</div>

      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
          @foreach($callmodes as $callmode)
            <tr>
              <td>{{$callmode->id}}</td>
              <td>{{$callmode->created_at}}</td>
              <td>{{$callmode->name}}</td>
              <td><a href="{{ route('callmodes.show',['id'=>$callmode->id])}}" class="btn btn-default">View</a></td>
            </tr>
          @endforeach
      </table>

    </div>

    {!! $callmodes->render() !!}

@endsection
