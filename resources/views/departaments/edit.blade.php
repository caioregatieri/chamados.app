@extends('template')

@section('title')
Edit departament
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
    <h3 class="panel-title">Edit departament: {{ $departament->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($departament, ['route'=>['departaments.update', $departament->id], 'method'=>'post']) !!}

      @include('departaments._form')

      <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
      {!! Form::submit('Save',['class'=>'btn btn-success']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection
