@extends('template')

@section('title')
Users
@endsection

@section('content')

    <a href="{{ route('users.create')}}" class="btn btn-success">Create new user</a>
    <br/>
    <br/>

    <div class="panel panel-default">
      <div class="panel-heading">Filter and search</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="search" type="text" class="form-control" placeholder="Name" />
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Users - Total: {{ $users->total() }}</div>

      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Name</th>
            <th>Locked</th>
            <th>Action</th>
          </tr>
          @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->name}}</td>
              <td><label class="label label-{{ $user->locked == 0 ? 'primary' : 'danger' }}">{{$user->locked == 0 ? 'No' : 'Yes'}}</label></td>
              <td><a href="{{ route('users.show',['id'=>$user->id])}}" class="btn btn-default">View</a></td>
            </tr>
          @endforeach
      </table>
    </div>

    {!! $users->render() !!}

@endsection
