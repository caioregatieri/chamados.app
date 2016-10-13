@extends('template')

@section('title')
Show call mode
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Details</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{ $callmode->id}} <br/>
    <b>Created at:</b>  {{ $callmode->created_at}}<br/>
    <b>Name:</b> {{ $callmode->name }} <br/>
    <b>Accent color:</b> {{ $callmode->color }} <br/>
    <b>Is start the call:</b> {{ $callmode->isstart == 0 ? 'No' : 'yes' }} <br/>
    <b>Is end the call:</b> {{ $callmode->isend == 0 ? 'No' : 'yes' }} <br/>
    @if($callmode->logs->count() > 1)
      <b>Houveram modificações neste registro</b>
    @endif
    <br/>
    <a href="{{ route('callmodes.index') }}" class="btn btn-default">Back</a>
    <a href="{{ route('callmodes.edit',['id'=>$callmode->id])}}" class="btn btn-primary">Edit call mode</a>

  </div>
</div>

@endsection
