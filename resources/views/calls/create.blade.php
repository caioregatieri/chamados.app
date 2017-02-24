@extends('template')

@section('title')
  Novo chamado
@endsection

@section('head')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" />
  @include('calls/_style')
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong> Algum(s) erros acontecerão ao enviar os dados.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#form').submit(function(){
        $('.btn-save').prop('disabled', true);
      });
      var departament_id = $('select[name=departament]').val();
      fillPlaces(departament_id);
      showFiles();
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
        $('select[name=place]').val("");
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
  </script>
@endsection
