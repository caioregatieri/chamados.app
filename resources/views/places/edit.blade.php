@extends('template')

@section('title')
Editando setor
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
    <h3 class="panel-title">Editando setor: {{ $place->name }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($place, ['route'=>['places.update', $place->id], 'method'=>'post']) !!}

      @include('places._form')

      <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
      
    {!! Form::close() !!}
  </div>
</div>

@endsection

@section('scripts')
  <!-- ckEditor -->
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#form').submit(function(){
        $('.btn-save').prop('disabled', true);
      });
      $('input[name=ip_range]').mask('000.000.000.000');
      $('input[name=ip_range]').on('blur', function(){
        console.log($(this).val());
        if(!validateIP($(this).val())){
          alert('IP inválido');
        }
      })
      function validateIP(ip){
        var padraoip = "^(?:(?:25[0-5]2[0-4][0-9][01]?[0-9][0-9]?)\.){3}(?:25[0-5]2[0-4][0-9][01]?[0-9][0-9]?)$";
        return ip.match(padraoip);
      }
    });
  </script>
@endsection
