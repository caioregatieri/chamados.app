@extends('template')

@section('title')
Calls
@endsection

@section('content')

    <a href="{{ route('calls.create')}}" class="btn btn-success">Create new call</a>
    <br/>
    <br/>

    <div class="panel panel-default">
      <div class="panel-heading">Filter and search</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="search" type="text" class="form-control" placeholder="Title" />
          </div>
          <div class="form-group">
              <select class="form-control" name="mode">
                <option value="" disabled selected>Mode</option>
                @foreach($modes as $mode)
                  <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="departament">
              <option value="" disabled selected>Departament</option>
              @foreach($departaments as $departament)
                <option value="{{ $departament->id }}">{{ $departament->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="place">
              <option value="" disabled selected>Place</option>
              <!--codigo-->
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="status">
              <option value="" disabled selected>Status</option>
              @foreach($callstatus as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Calls - Total: {{ $calls->total() }}</div>
      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Mode</th>
            <th>Departament</th>
            <th>Place</th>
            <th>Title</th>
            <th>Action</th>
          </tr>
          @foreach($calls as $call)
              <tr class="list-group-item-{{$call->color}}">
              <td>{{$call->id}}</td>
              <td>{{$call->created_at}}</td>
              <td>{{$call->mode}}</td>
              <td>{{$call->departament}}</td>
              <td>{{$call->place}}</td>
              <td>{{$call->title}}</td>
              <td><a href="{{ route('calls.show',['id'=>$call->id])}}" class="btn btn-default">View</a></td>
            </tr>
          @endforeach
      </table>

    </div>

    {!! $calls->render() !!}

@endsection

@section('scripts')
  <script type="text/javascript">

    $( document ).ready(function() {
      $('select[name=place]').empty();
      var departament_id = $('select[name=departament]').val();
      fillPlaces(departament_id);
      SetPagination();
    });

    $('select[name=departament]').change(function(){
      var departament_id = $(this).val();
      fillPlaces(departament_id);
    });

    function fillPlaces(departament_id){
      $.get('/places/json/'+departament_id, function(places){
        $('select[name=place]').empty();
        $('select[name=place]').append('<option value="" disabled selected>Place</option>');
        $.each(places, function(key, value){
          $('select[name=place]').append('<option value='+value.id+'>'+value.name+'</option>');
        });
      });
    }

  </script>
@endsection
