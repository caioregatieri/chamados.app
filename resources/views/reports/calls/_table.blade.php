<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading clearfix">
    <div class="btn-group pull-left">
      <a href="#" class="btn btn-primary btn-sm btn-print"><i class="fa fa-print"></i> Imprimir</a>
    </div>
    <h4 class="panel-title pull-right" style="padding-top: 7.5px;">Registros: {{ count($calls) }}</h4>
  </div>
  <!-- Table -->
  <table id="table" class="table table-striped">
      <tr>
        <th>Id</th>
        <th>Aberto em</th>
        <th>Por</th>
        <th>Tipo</th>
        <th>Secretaria</th>
        <th>Setor</th>
        <th>Titulo</th>
        <th>Situação</th>
      </tr>
      @foreach($calls as $call)
        <tr>
          <td>{{$call->id}}</td>
          <td>{{date("d/m/Y h:i:s", strtotime($call->created_at))}}</td>
          <td>{{$call->usuario}}</td>
          <td>{{$call->mode}}</td>
          <td>{{$call->departament}}</td>
          <td>{{$call->place}}</td>
          <td>{{$call->title}}</td>
          <td>{{$call->status}}</td>
        </tr>
        <tr>
          <td colspan="8">
            <table class="table" style="margin-bottom: 0;">
              <tr>
                <th>Descrição</th>
              </tr>
              <tr>
                <td>{!!$call->description!!}</td>
              </tr>
            </table>
          </td>
        </tr>
      @endforeach
  </table>
</div>
