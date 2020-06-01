@extends('template')

@section('title')
Redefinir senha de usuário
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
    <h3 class="panel-title">Reset password for user: {{ $user->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($user, ['route'=>['users.password.update', $user->id], 'method'=>'post']) !!}

      @include('users._password')

      <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
      {!! Form::submit('Save',['class'=>'btn btn-success']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection
