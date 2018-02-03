@extends('template')

@section('title')
Editar status
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong> Algum(s) erros aconteceram ao enviar os dados.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Editando status: {{ $callstatus->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($callstatus, ['route'=>['callstatus.update', $callstatus->id], 'method'=>'post']) !!}

      @include('callstatus._formEdit')

      <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>

    {!! Form::close() !!}
  </div>
</div>

@endsection
