@extends('template')

@section('title')
Departaments
@endsection

@section('content')

    <a href="{{ route('departaments.create')}}" class="btn btn-success">Create new departament</a>
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
      <div class="panel-heading">Departaments - Total: {{ $departaments->total() }}</div>

      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
          @foreach($departaments as $departament)
            <tr>
              <td>{{$departament->id}}</td>
              <td>{{$departament->created_at}}</td>
              <td>{{$departament->name}}</td>
              <td><a href="{{ route('departaments.show',['id'=>$departament->id])}}" class="btn btn-default">View</a></td>
            </tr>
          @endforeach
      </table>

    </div>

    {!! $departaments->render() !!}

@endsection
