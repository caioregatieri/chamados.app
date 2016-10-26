@extends('template')

@section('title')
Departament
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
            <input name="search" type="text" class="form-control" placeholder="Titulo ou descrição" />
          </div>

          <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>
        </form>
      </div>
    </div>

    @include('reports.departaments._table')

@endsection

@section('scripts')
  <!-- select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
  <script src="{{ asset('js/moment.min.js') }}"></script>
  <script src="{{ asset('js/daterangepicker.js') }}"></script>

  <script type="text/javascript">

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
