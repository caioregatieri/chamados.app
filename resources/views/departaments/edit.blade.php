@extends('template')

@section('title')
Edit departament
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
    <h3 class="panel-title">Editando: {{ $departament->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($departament, ['route'=>['departaments.update', $departament->id], 'method'=>'post']) !!}

      @include('departaments._form')

      <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection
