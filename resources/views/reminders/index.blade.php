@extends('template')

@section('title')
  Lembretes
@endsection

@section('content')

    @if(Session::has('created'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sucesso!</strong> Lembrete criado com sucesso.
      </div>
    @endif
    @if(Session::has('updated'))
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sucesso!</strong> Lembrete alterado com sucesso.
      </div>
    @endif
    <div class="panel panel-default">
      <div class="panel-heading">Filtrar e pesquisar</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input name="search" type="text" class="form-control" placeholder="Titulo" />
          </div>
          <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading clearfix">
        <div class="btn-group pull-left">
          <a href="{{ route('reminders.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Novo</a>
        </div>
        <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $reminders->total() }}</h4>
      </div>

      <!-- Table -->
      <table class="table table-striped table-condensed">
          <tr>
            <th>Titulo</th>
            <th></th>
          </tr>
          @foreach($reminders as $reminder)
            <tr>
              <td>{{$reminder->title}}</td>
              <td style="text-align: right;"><a href="{{ route('reminders.show',['id'=>$reminder->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a></td>
            </tr>
          @endforeach
      </table>
    </div>

    <div class="row row-centered" style="text-align: center;">
      {!! $reminders->render() !!}
    </div>

@endsection
