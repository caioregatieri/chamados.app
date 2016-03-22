@extends('template')

@section('title')
Show place
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Details</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$departament->id}} <br/>
    <b>Created at:</b>  {{$departament->created_at}}<br/>
    <b>Name:</b> {{ $departament->name }} <br/><br/>

    <a href="{{ route('departaments.index') }}" class="btn btn-default">Back</a>
    <a href="{{ route('departaments.edit',['id'=>$departament->id])}}" class="btn btn-primary">Edit</a>

  </div>
</div>

@endsection
