@extends('template')

@section('title')
Show User
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Details</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$user->id}} <br/>
    <b>Created at:</b>  {{$user->created_at}}<br/>
    <b>Name:</b> {{ $user->name }} <br/>
    <b>User type:</b> {{ $user->usertype->name }} <br/>
    <b>Departament:</b> {{ $user->place->departament->name }} <br/>
    <b>Place:</b> {{ $user->place->prefix }} {{ $user->place->name }} <br/>
    <b>Register:</b> {{ $user->register }} <br/>
    <b>E-mail:</b> {{ $user->email }} <br/>
    <b>Locked:</b> {{ $user->locked == 0 ? 'No' : 'Yes' }} <br/><br/>

    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
    <a href="{{ route('users.edit',['id'=>$user->id])}}" class="btn btn-primary">Edit</a>

  </div>
</div>

@endsection
