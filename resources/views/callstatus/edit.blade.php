@extends('template')

@section('title')
Edit call modes
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
    <h3 class="panel-title">Edit call status: {{ $callstatus->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($callstatus, ['route'=>['callstatus.update', $callstatus->id], 'method'=>'post']) !!}

      @include('callstatus._formEdit')

      <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
      {!! Form::submit('Save',['class'=>'btn btn-success']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection
