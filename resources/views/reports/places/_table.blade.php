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
        <th>Região</th>
        <th>Secretaria</th>
        <th>Setor</th>
      </tr>
      @foreach($places as $place)
        <tr>
          <td>{{$place->id}}</td>
          <td>{{$place->created_at}}</td>
          <td>{{$place->region}}</td>
          <td>{{$place->Departament->name}}</td>
          <td>{{$place->name}}</td>
        </tr>
      @endforeach
  </table>

</div>
