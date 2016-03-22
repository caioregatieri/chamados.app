@extends('template')

@section('title')
Show user type
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Details</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{$usertype->id}} <br/>
    <b>Created at:</b>  {{$usertype->created_at}}<br/>
    <b>Name:</b> {{ $usertype->name }} <br/>
    <b>Administrador:</b> {{ $usertype->administrator == 0 ? 'No' : 'Yes' }} <br/>
    <b>Calls only for your site:</b> {{ $usertype->onlyyourplace == 0 ? 'No' : 'Yes' }} <br/><br/>

    <a href="{{ route('usertypes.index') }}" class="btn btn-default">Back</a>
    <a href="{{ route('usertypes.edit',['id'=>$usertype->id])}}" class="btn btn-primary">Edit</a>

  </div>
</div>

@endsection
