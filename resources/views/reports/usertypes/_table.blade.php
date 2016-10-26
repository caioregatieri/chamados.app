<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading clearfix">
    <div class="btn-group pull-left">
      <a href="#" class="btn btn-primary btn-sm btn-print"><i class="fa fa-print"></i> Imprimir</a>
    </div>
    <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $usertypes->count() }}</h4>
  </div>

  <!-- Table -->
  <table id="table" class="table table-striped">
      <tr>
        <th>Id</th>
        <th>Data</th>
        <th>Nome</th>
      </tr>
      @foreach($usertypes as $usertype)
        <tr>
          <td>{{$usertype->id}}</td>
          <td>{{$usertype->created_at}}</td>
          <td>{{$usertype->name}}</td>
        </tr>
      @endforeach
  </table>

</div>
