
<div class="form-group">
  {!! Form::label('user','Usuário:') !!}
  {!! Form::select('user', $users, (isset($call->user->id) ? $call->user->id : null ), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('mode','Tipo:') !!}
  {!! Form::select('mode', $modes, (isset($call->mode->id) ? $call->mode->id : null ), ['class'=>'form-control', 'autofocus'=>'true']) !!}
</div>

<div class="form-group">
  {!! Form::label('departament','Secretaria:') !!}
  {!! Form::select('departament', $departaments, (isset($call->place->departament->id) ? $call->place->departament->id : Auth::user()->place->departament->id ), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('place','Setor:') !!}
  {!! Form::select('place', $places, (isset($call->place->id) ? $call->place->id : Auth::user()->place->id ), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('title','Titulo:') !!}
  {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('description','Descrição:') !!}
  {!! Form::textarea('description', null, ['class'=>'ckeditor form-control']) !!}
</div>

<div class="panel panel-default">
  <div class="panel-heading">Anexos</div>
  <div class="panel-body">
	  <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-primary fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Selecione...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="files" type="file" name="files[]" multiple>
    </span>
    <br/>
    <br/>
    <!-- The container for the uploaded files -->
    <div id="filesAttacheds">
      <p>Nenhum arquivo selecionado</p>
    </div>
  </div>
</div>
