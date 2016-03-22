@extends('template')

@section('title')
User types
@endsection

@section('content')

    <a href="{{ route('usertypes.create')}}" class="btn btn-success">Create new user type</a>
    <br/>
    <br/>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">User types - Total: {{ $usertypes->total() }}</div>

      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
          @foreach($usertypes as $usertype)
            <tr>
              <td>{{$usertype->id}}</td>
              <td>{{$usertype->created_at}}</td>
              <td>{{$usertype->name}}</td>
              <td><a href="{{ route('usertypes.show',['id'=>$usertype->id])}}" class="btn btn-default">View</a></td>
            </tr>
          @endforeach
      </table>

    </div>

    {!! $usertypes->render() !!}

@endsection
