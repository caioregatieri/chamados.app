@extends('template')

@section('title')
Places
@endsection

@section('content')

    <a href="{{ route('places.create')}}" class="btn btn-success">Create new place</a>
    <br/>
    <br/>

    <div class="panel panel-default">
      <div class="panel-heading">Filter and search</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="search" type="text" class="form-control" placeholder="Name" />
          </div>
          <div class="form-group">
            <select class="form-control" name="departament">
              <option value="" disabled selected>Departament</option>
              @foreach($departaments as $departament)
                <option value="{{ $departament->id }}">{{ $departament->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Places - Total: {{ $places->total() }}</div>

      <!-- Table -->
      <table class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Region</th>
            <th>Departament</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
          @foreach($places as $place)
            <tr>
              <td>{{$place->id}}</td>
              <td>{{$place->created_at}}</td>
              <td>{{$place->region}}</td>
              <td>{{$place->Departament->name}}</td>
              <td>{{$place->name}}</td>
              <td><a href="{{ route('places.show',['id'=>$place->id])}}" class="btn btn-default">View</a></td>
            </tr>
          @endforeach
      </table>
    </div>

    {!! $places->render() !!}

@endsection
