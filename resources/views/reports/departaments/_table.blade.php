<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading clearfix">
    <div class="btn-group pull-left">
      <a href="#" class="btn btn-primary btn-sm btn-print"><i class="fa fa-print"></i> Imprimir</a>
    </div>
    <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $departaments->count() }}</h4>
  </div>

  <!-- Table -->
  <table id="table" class="table table-striped">
      <tr>
        <th>Id</th>
        <th>Data</th>
        <th>Nome</th>
      </tr>
      @foreach($departaments as $departament)
        <tr>
          <td>{{$departament->id}}</td>
          <td>{{$departament->created_at}}</td>
          <td>{{$departament->name}}</td>
        </tr>
      @endforeach
  </table>

</div>
