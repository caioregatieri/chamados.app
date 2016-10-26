@extends('template')

@section('title')
Calls
@endsection

@section('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" />
  <link rel="stylesheet" href="{{ asset('css/daterangepicker.css')}}" />
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
            <input name="created_at" type="text" class="form-control" placeholder="" />
          </div>

          <div class="form-group">
            <select class="form-control" name="user">
              <option value="" disabled selected>Todos</option>
              @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
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
            <input name="search" type="text" class="form-control" placeholder="Titulo ou descrição" />
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

    @include('reports.calls._table')

@endsection

@section('scripts')
  <!-- select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
  <script src="{{ asset('js/moment.min.js') }}"></script>
  <script src="{{ asset('js/daterangepicker.js') }}"></script>

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

    $('.btn-print').on('click', function(e){
      e.preventDefault();
      var mywindow = window.open('', 'print', '');
      var btp = $("link[name='bootstrap']").attr('href');
      var data = $("#table").html();
      mywindow.document.write('<html><head><title>Relátorio</title>');
      mywindow.document.write('<link rel="stylesheet" href="'+btp+'" type="text/css" />');
      mywindow.document.write('</head><body><table class="table table-striped">');
      mywindow.document.write(data);
      mywindow.document.write('</table></body></html>');
      mywindow.document.close(); // necessary for IE >= 10
      mywindow.focus(); // necessary for IE >= 10
    });

    $('input[name="created_at"]').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY'
      },
      startDate: '10/08/2011'
    });

  </script>
@endsection
