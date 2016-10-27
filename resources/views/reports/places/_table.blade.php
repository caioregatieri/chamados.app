<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading clearfix">
    <div class="btn-group pull-left">
      <a href="#" class="btn btn-primary btn-sm btn-print"><i class="fa fa-print"></i> Imprimir</a>
    </div>
    <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ $places->count() }}</h4>
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
        <tr>
          <td colspan="5">
            <table class="table" style="margin-bottom: 0;">
              <tr>
                <th>Logradouro</th>
                <th>Numero</th>
                <th>Bairro</th>
                <th>Telefones</th>
                <th>Chefia</th>
                <th>E-mail</th>
              </tr>
              <tr>
                <td>{{$place->address}}</td>
                <td>{{$place->number}}</td>
                <td>{{$place->neighborhood}}</td>
                <td>{{$place->telephone1}} {{$place->telephone2}}</td>
                <td>{{$place->responsavel}}</td>
                <td>{{$place->email}}</td>
              </tr>
            </table>
          </td>
        </tr>
      @endforeach
  </table>

</div>
