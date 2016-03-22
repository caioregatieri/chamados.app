<div class="form-group">
  {!! Form::hidden('call', $call->id, null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('user','User:') !!}
  {!! Form::select('user', $users, null,['class'=>'form-control']) !!}
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

<div class="form-group">
  {!! Form::label('status','Status:') !!}
  {!! Form::select('status', $status, 3, ['class'=>'form-control']) !!}
</div>


