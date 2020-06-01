@extends('template')

@section('title')
Editar tipo de chamado
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong> Algo está errado.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Editado: {{ $callmode->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($callmode, ['route'=>['callmodes.update', $callmode->id], 'method'=>'post']) !!}

      @include('callmodes._formEdit')

      <a href="{{ route('callmodes.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success btn-save"><i class="fa fa-check"></i> Salvar</button>

    {!! Form::close() !!}
  </div>
</div>

@endsection
