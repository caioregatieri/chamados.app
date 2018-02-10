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
      @foreach($calls as $call)
        <tr>
          <td>
            <table class="table" style="margin-bottom: 0;">
              <tr>
                <th>Id</th>
                <th>Aberto em</th>
                <th>Tipo</th>
                <th>Secretaria</th>
                <th>Setor</th>
              </tr>
              <tr>
                <td>{{$call->id}}</td>
                <td>{{date("d/m/Y h:i:s", strtotime($call->created_at))}}</td>
                <td>{{$call->mode}}</td>
                <td>{{$call->departament}}</td>
                <td>{{$call->place}}</td>                
              </tr>
            </table>
            <table class="table" style="margin-bottom: 0;">
              <tr>
                <th>Solicitante</th>
                <th>Titulo</th>
                <th>Situação</th>
              </tr>
              <tr>
                <td>{{$call->requester}}</td>
                <td>{{$call->title}}</td>
                <td style="width: 150px;">{{$call->status}}</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td></td>
        </tr>
      @endforeach
  </table>
</div>
