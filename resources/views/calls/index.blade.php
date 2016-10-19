@extends('template')

@section('title')
Calls
@endsection

@section('head')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <br/>
    <br/>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">Filtrar e pesquisar</h4>
      </div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="search" type="text" class="form-control" placeholder="Titulo ou descrição" />
          </div>
          <div class="form-group">
              <select class="form-control" name="mode">
                <option value="" disabled selected>Tipo</option>
                @foreach($modes as $mode)
                  <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="departament">
              <option value="" disabled selected>Secretaria</option>
              @foreach($departaments as $departament)
                <option value="{{ $departament->id }}">{{ $departament->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="place">
              <option value="" disabled selected>Setor</option>
              <!--codigo-->
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="status">
              <option value="" disabled selected>Situação</option>
              @foreach($callstatus as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading clearfix">
        <div class="btn-group pull-left">
          <a href="{{ route('calls.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $calls->total() }}</h4>
      </div>
      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Tipo</th>
            <th>Secretaria</th>
            <th>Setor</th>
            <th>Titulo</th>
            <th></th>
          </tr>
          @foreach($calls as $call)
              <tr class="list-group-item-{{$call->color}}">
              <td>{{$call->id}}</td>
              <td>{{$call->created_at}}</td>
              <td>{{$call->mode}}</td>
              <td>{{$call->departament}}</td>
              <td>{{$call->place}}</td>
              <td>{{$call->title}}</td>
              <td><a href="{{ route('calls.show',['id'=>$call->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a></td>
            </tr>
          @endforeach
      </table>

    </div>

    <div class="row row-centered" style="text-align: center;">
      {!! $calls->render() !!}  
    </div>
    

@endsection

@section('scripts')
  <!-- select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>

  <script type="text/javascript">

    $( document ).ready(function() {
      $('select[name=place]').empty();
      var departament_id = $('select[name=departament]').val();
      fillPlaces(departament_id);
    });

    $('select[name=departament]').change(function(){
      var departament_id = $(this).val();
      fillPlaces(departament_id);
    });

    function fillPlaces(departament_id){
      $.get('/places/json/'+departament_id, function(places){
        $('select[name=place]').empty();
        $('select[name=place]').append('<option value="" disabled selected>Setor</option>');
        $.each(places, function(key, value){
          $('select[name=place]').append('<option value='+value.id+'>'+value.name+'</option>');
        });
        $('select[name=place]').select2();
      });
    }

  </script>
@endsection
