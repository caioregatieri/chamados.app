@extends('template')

@section('title')
Lembretes
@endsection

@section('content')

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
      <table class="table">
          <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Titulo</th>
            <th></th>
          </tr>
          @foreach($reminders as $reminder)
            <tr>
              <td>{{$reminder->id}}</td>
              <td>{{$reminder->created_at}}</td>
              <td>{{$reminder->title}}</td>
              <td style="text-align: right;"><a href="{{ route('reminders.show',['id'=>$reminder->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a></td>
            </tr>
          @endforeach
      </table>
    </div>

    <div class="row row-centered" style="text-align: center;">
      {!! $reminders->render() !!}
    </div>

@endsection
