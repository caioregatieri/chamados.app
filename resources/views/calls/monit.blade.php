@extends('template')

@section('title')
    Monitoramento de Chamados
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
    <style>
        .list-group-item-success{
            border-color: #5cb85c;
            color: #fff;
            background-color: #5cb85c;
        }
        .list-group-item-info{
            border-color: #337ab7;
            color: #fff;
            background-color: #337ab7;
        }
        .list-group-item-danger{
            border-color: #d9534f;
            color: #fff;
            background-color: #d9534f;
        }
        .list-group-item-warning{
            border-color: #f0ad4e;
            color: #fff;
            background-color: #f0ad4e;
        }
    </style>
    <style>
        .navbar, .sidebar, #rodape {
            display: none !important;
            visibility: hidden !important;
        }
        #page-wrapper {
            margin-left: 0 !important;
            margin-top: -50px;
        }
    </style>
@endsection

@section('content')   

    @if(Auth::user()->usertype->administrator == "1")
      <div class="panel panel-default" style="display: none;">
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
    @endif

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading clearfix">
        <div class="pull-left">
          <!-- <a href="{{ route('calls.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a> -->
          <div class="btn-group">
              <a href="{{ route('calls.index') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
              <!-- <a href="#" class="btn btn-default btn-sm btn-config"><i class="fa fa-cog"></i></a> -->
          </div>
          <!-- <h4 class="panel-title" style="display: inline;">Monitoramento de Chamados</h4> -->
        </div>
        <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Exibindo os ultimos {{ $calls->perPage() }} chamados</h4>
      </div>
      <!-- Table -->
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Aberto em</th>
            <th>Tipo</th>
            <!-- <th>Secretaria</th> -->
            <th>Setor</th>
            <th>Solicitante</th>
            <th>Titulo</th>
            <!-- <th></th> -->
          </tr>
          @foreach($calls as $call)
              <tr class="list-group-item-{{$call->color}}">
              <td><strong>{{$call->id}}</strong></td>
              <td>{{date("d/m/Y h:i:s", strtotime($call->created_at))}}</td>
              <td>{{$call->mode}}</td>
              <!-- <td>{{$call->departament}}</td> -->
              <td>{{$call->prefix}} - {{$call->place}}</td>
              <td>{{$call->requester}}</td>
              <td>{{$call->title}}</td>
              <!-- <td style="text-align: right;"><a href="{{ route('calls.show',['id'=>$call->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a></td> -->
            </tr>
          @endforeach
      </table>
    </div>

    <div id="display_refresh_message"></div> 

    <div class="row row-centered" style="text-align: center; display: none;">
      {!! $calls->render() !!}
    </div>

@endsection

@section('scripts')
  <!-- select2 -->
  <script src="{{ asset('js/select2.min.js') }}"></script>

  <script type="text/javascript">

    $( document ).ready(function() {
      $('select[name=place]').empty();
      var departament_id = $('select[name=departament]').val();
      fillPlaces(departament_id);

      var interval = 0;
      var segundos = 60;
      setInterval(function(){
        interval++;
        $('#display_refresh_message').html( '<p>Atualizando em: <small>' + (segundos - interval) + '</small> sec.</p>' )
        if (interval >= segundos){
          interval = 0;
          //location.reload();
          window.location.href = "{{ route('calls.graphs') }}";
        }
      }, 1000)

      $('.btn-config').on('click', function(e){
        e.preventDefault();
        alert('disponível em breve');
      })
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
          $('select[name=place]').append('<option value='+value.id+'>'+value.prefix+' - '+value.name+'</option>');
        });
        $('select[name=place]').select2();
      });
    }
  </script>
@endsection
