
<div class="form-group">
  {!! Form::label('user','User:') !!}
  {!! Form::select('user', $users, (isset($call->user->id) ? $call->user->id : null ), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('mode','Mode:') !!}
  {!! Form::select('mode', $modes, (isset($call->mode->id) ? $call->mode->id : null ), ['class'=>'form-control', 'autofocus'=>'true']) !!}
</div>

<div class="form-group">
  {!! Form::label('departament','Departament:') !!}
  {!! Form::select('departament', $departaments, (isset($call->place->departament->id) ? $call->place->departament->id : Auth::user()->place->departament->id ), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('place','Place:') !!}
  {!! Form::select('place', $places, (isset($call->place->id) ? $call->place->id : Auth::user()->place->id ), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('title','Title:') !!}
  {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('description','Description:') !!}
  {!! Form::textarea('description', null, ['class'=>'ckeditor form-control']) !!}
</div>

<div class="panel panel-default">
  <div class="panel-heading">Attachments</div>
  <div class="panel-body">
	  <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-primary fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Select files...</span>
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
