@extends('template')

@section('title')
  New history
@endsection

@section('head')
  @include('calls/_style')  
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong>Tivemos alguns problemas.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">New history for call: {{ $call->title }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::open(['route'=>'calls.history.store', 'method'=>'post', 'id'=>'form', 'enctype'=>'multipart/form-data']) !!}

      @include('calls/history/_form')

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
  
  <script type="text/javascript">
    $(document).ready(function(){ showFiles(); });
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