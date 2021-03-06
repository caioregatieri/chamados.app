@extends('template')

@section('title')
Editar Chamado
@endsection

@section('head')
  @include('calls/_style')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong> algo está errado.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{!! $error !!}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Editando chamado: {{ $call->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($call, ['route'=>['calls.update', $call->id], 'method'=>'post', 'id'=>'form', 'enctype'=>'multipart/form-data']) !!}

      @include('calls._form')

      <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>

    {!! Form::close() !!}
  </div>
</div>

@endsection


@section('scripts')
  <!-- JQuery-Mask -->
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

  <!-- ckEditor -->
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

  <!-- select2 -->
  <script src="{{ asset('js/select2.min.js') }}"></script>

  <!--JQuery-ui -->
  <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

  <script type="text/javascript">
    //lista de titulos de chamados
    var titles = {!! $callTitles !!};
    //lista de solicitantes de chamados
    var requesters = {!! $callRequesters !!};

    $(document).ready(function(){
      var departament_id = $('select[name=departament]').val();
      var place_id = $('select[name=place]').val();
      fillPlaces(departament_id, place_id);
      
      $("#requester" ).autocomplete({
        minLength: 3,
        delay: 500,
        // autoFocus: true,
        source: requesters
      });

      $("#title" ).autocomplete({
        minLength: 3,
        delay: 500,
        source: titles
      });
    });
    
    $('select[name=departament]').change(function(){
      var departament_id = $(this).val();
      fillPlaces(departament_id, "");
    });

    function fillPlaces(departament_id, place_id){
      $.get('/places/json/'+departament_id, function(places){
        $('select[name=place]').empty();
        $('select[name=place]').append('<option value="" disabled selected>Place</option>');
        $.each(places, function(key, value){
          $('select[name=place]').append('<option value='+value.id+'>'+ value.prefix + ' - ' + value.name+'</option>');
        });
        $('select[name=place]').val(place_id);
        $('select[name=place]').select2();
      });
    }

    $(window).resize(function(){
        $('select[name=place]').select2();
    });
  </script>
@endsection
