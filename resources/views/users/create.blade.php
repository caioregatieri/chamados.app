@extends('template')

@section('title')
Novo usuário
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong> Algum(s) erros aconteceram ao enviar os dados.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{!! $error !!}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Novo</h3>
  </div>
  <div class="panel-body">

    {!! Form::open(['route'=>'users.store', 'method'=>'post', 'id'=>'form']) !!}

      @include('users/_formCreate')

      @include('users/_password')

      <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success btn-save"><i class="fa fa-check"></i> Salvar</button>

    {!! Form::close() !!}
  </div>
</div>

@endsection

@section('scripts')
  <!-- ckEditor -->
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#form').submit(function(){
        $('.btn-save').prop('disabled', true);
      });

      $('#email').on('blur', function(e){
        e.preventDefault();
        inputValue = $(this).val();
        if (inputValue.length == 0) return;
        if (inputValue.indexOf('@') >= 0) return;
        $(this).val(inputValue + '@franca.sp.gov.br')
      })
    })
  </script>
@endsection
