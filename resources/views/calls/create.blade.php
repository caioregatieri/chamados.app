@extends('template')

@section('title')
Novo chamado
@endsection

@section('head')
  @include('calls/_style')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong> Algo está errado.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{!! $error !!}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Novo chamado</h3>
  </div>
  <div class="panel-body">

    {!! Form::open(['route'=>'calls.store', 'method'=>'post', 'id'=>'form', 'enctype'=>'multipart/form-data']) !!}

      @include('calls/_form')

      <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success btn-save"><i class="fa fa-check"></i> Salvar</button>

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
      $('#form').submit(function(){
        $('.btn-save').prop('disabled', true);
      });
      var departament_id = $('select[name=departament]').val();
      fillPlaces(departament_id);
      showFiles();

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
      fillPlaces(departament_id);
    });

    function fillPlaces(departament_id){
      $.get('/places/json/'+departament_id, function(places){
        $('select[name=place]').empty();
        $('select[name=place]').append('<option value="" disabled selected>Place</option>');
        $.each(places, function(key, value){
          $('select[name=place]').append('<option value='+value.id+'>'+value.prefix+' - '+value.name+'</option>');
        });
        setTimeout(function(){
          if(places.length > 1) {
            $('select[name=place]').val("");
          }else{
            $('select[name=place]').val(places[0].id);
            $('select[name=place]').prop('readonly','readonly');
            $('select[name=place]').select2()
          }
        }, 1000)
        $('select[name=place]').select2();
      });
    }

    $("#files").change(function(){ showFiles(); });
    
    function showFiles(){
      var files = $("#files")[0].files;
      var filesCount = files.length;
      $("#filesAttacheds").children("p").remove();
      if (filesCount > 0){
        for(i = 0; i < filesCount; i++){
          $("#filesAttacheds").append("<p>"+files[i].name+"</p>");
        }
      }else{
        $("#filesAttacheds").append("<p>Nenhum arquivo selecionado</p>");
      }
    }

    $(window).resize(function(){
        $('select[name=place]').select2();
    });

    $('input[name=requester_email]').on('blur', function(e){
      e.preventDefault();
      inputValue = $(this).val();
      if (inputValue.length == 0) return;
      if (inputValue.indexOf('@') >= 0) return;
      const domain = '{!! env("EMAIL_DOMAIN") !!}';
      if (!domain) return;
      $(this).val(inputValue + '@' + domain.replace(new RegExp('@', 'g'), ''))
    })
  </script>
@endsection
