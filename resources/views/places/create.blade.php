@extends('template')

@section('title')
New Place
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
    <h3 class="panel-title">New place</h3>
  </div>
  <div class="panel-body">

    {!! Form::open(['route'=>'places.store', 'method'=>'post', 'id'=>'form']) !!}

      @include('places/_form')

      <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success bt-save"><i class="fa fa-check"></i> Salvar</button>

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
    });
  </script>
@endsection
