<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading clearfix">
    <div class="btn-group pull-left">
      <a href="#" class="btn btn-primary btn-sm btn-print"><i class="fa fa-print"></i> Imprimir</a>
    </div>
    <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $users->count() }}</h4>
  </div>

  <!-- Table -->
  <table id="table" class="table table-striped">
      <tr>
        <th>Id</th>
        <th>Data</th>
        <th>Nome</th>
        <th style="text-align: center;">Bloqueado</th>
      </tr>
      @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->created_at}}</td>
          <td>{{$user->name}}</td>
          <td style="text-align: center;">
            <label class="label label-{{ $user->locked == 0 ? 'primary' : 'danger' }}">{{$user->locked == 0 ? 'Não' : 'Sim'}}</label>
          </td>
        </tr>
      @endforeach
  </table>

</div>
