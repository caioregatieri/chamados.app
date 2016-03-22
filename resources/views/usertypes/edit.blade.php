@extends('template')

@section('title')
Edit user type
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
    <h3 class="panel-title">Edit user type: {{ $usertype->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($usertype, ['route'=>['usertypes.update', $usertype->id], 'method'=>'post']) !!}

      @include('usertypes._formEdit')

      <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
      {!! Form::submit('Save',['class'=>'btn btn-success']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection
