@extends('template')

@section('title')
New user type
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
    <h3 class="panel-title">New user type</h3>
  </div>
  <div class="panel-body">

    {!! Form::open(['route'=>'usertypes.store', 'method'=>'post']) !!}

      @include('usertypes/_formCreate')

      <a href="{{ route('usertypes.index') }}" class="btn btn-default">Back</a>
      {!! Form::submit('Save',['class'=>'btn btn-success']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection
