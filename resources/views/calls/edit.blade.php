@extends('template')

@section('title')
Editar Chamado
@endsection

@section('head')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/css/select2.min.css" rel="stylesheet" />  
  @include('calls/_style')
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit call: {{ $call->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($call, ['route'=>['calls.update', $call->id], 'method'=>'post', 'id'=>'form', 'enctype'=>'multipart/form-data']) !!}

      @include('calls._form')

      <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
      {!! Form::submit('Save',['class'=>'btn btn-success']) !!}

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
    $('select[name=departament]').change(function(){
      var departament_id = $(this).val();
      fillPlaces(departament_id, "");
    });
    $(document).ready(function(){
      var departament_id = $('select[name=departament]').val();
      var place_id = $('select[name=place]').val();
      fillPlaces(departament_id, place_id);
    });
    function fillPlaces(departament_id, place_id){
      $.get('/places/json/'+departament_id, function(places){
        $('select[name=place]').empty();
        $('select[name=place]').append('<option value="" disabled selected>Place</option>');
        $.each(places, function(key, value){
          $('select[name=place]').append('<option value='+value.id+'>'+value.name+'</option>');
        });
        $('select[name=place]').val(place_id);
        $('select[name=place]').select2();
      });
    }
  </script>
@endsection
