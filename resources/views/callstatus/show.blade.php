@extends('template')

@section('title')
Show call status
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Detalhes</h3>
  </div>
  <div class="panel-body">
    <b>Id:</b> {{ $callstatus->id}} <br/>
    <b>Criado em:</b>  {{ $callstatus->created_at}}<br/>
    <b>Titulo:</b> {{ $callstatus->name }} <br/>
    <b>Cor de destaque: <span class="label label-{{$callstatus->color}}">{{ $callstatus->color }}</span></b> <br/>
    <b>É o inicio do atendimento:</b> {{ $callstatus->isstart == '0' ? 'Não' : 'Sim' }} <br/>
    <b>É o fim do atendimento:</b> {{ $callstatus->isend == '0' ? 'Não' : 'Sim' }} <br/>
    @if($callstatus->logs->count() > 1)
      <b>Houveram modificações neste registro</b>
    @endif
    <br/>    
    <a href="{{ route('callstatus.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
    <a href="{{ route('callstatus.edit',['id'=>$callstatus->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>

  </div>
</div>

@endsection
