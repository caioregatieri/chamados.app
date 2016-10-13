@extends('template')

@section('title')
Show call status
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Details</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{ $callstatus->id}} <br/>
    <b>Created at:</b>  {{ $callstatus->created_at}}<br/>
    <b>Name:</b> {{ $callstatus->name }} <br/>
    <b>Accent color:</b> {{ $callstatus->color }} <br/>
    <b>Is start the call:</b> {{ $callstatus->isstart == '0' ? 'No' : 'Yes' }} <br/>
    <b>Is end the call:</b> {{ $callstatus->isend == '0' ? 'No' : 'Yes' }} <br/>
    @if($callstatus->logs->count() > 1)
      <b>Houveram modificações neste registro</b>
    @endif
    <br/>    
    <a href="{{ route('callstatus.index') }}" class="btn btn-default">Back</a>
    <a href="{{ route('callstatus.edit',['id'=>$callstatus->id])}}" class="btn btn-primary">Edit</a>

  </div>
</div>

@endsection
