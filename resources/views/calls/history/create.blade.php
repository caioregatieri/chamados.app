@extends('template')

@section('title')
  Novo atendimento
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
    <h3 class="panel-title">Detalhes do chamado</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$call->id}} <br/>
    <b>Criado em:</b>  {{$call->created_at}}<br/>
    <b>Atualizado em:</b>  {{$call->updated_at}}<br/>
    <b>Criado por:</b> {{$call->user->name}} <br/>
    <b>Tipo:</b> {{$call->mode->name}} <br/>
    <b>Secretaria:</b> {{$call->place->Departament->name}} <br/>
    <b>Setor:</b><a href="{{ route('places.show',['id'=>$call->place->id]) }}"> {{$call->place->prefix}} - {{$call->place->name}} </a><br/>
    <b>Solicitante:</b> {{ $call->register }} - {{ $call->requester }} <br/>
    <b>Titulo:</b> {{ $call->title }} <br/>
    <b>Descrição:</b>
    <div class="panel panel-default">
      <div class="panel-body">
        {!! $call->description !!}
      </div>
    </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Novo atendimento</h3>
  </div>
  <div class="panel-body">

    {!! Form::open(['route'=>'calls.history.store', 'method'=>'post', 'id'=>'form', 'enctype'=>'multipart/form-data']) !!}

      @include('calls/history/_form')

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
  
  <script type="text/javascript">
    $(document).ready(function(){ 
      $('#form').submit(function(){
        $('.btn-save').prop('disabled', true);
      });
      showFiles(); 
    });
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