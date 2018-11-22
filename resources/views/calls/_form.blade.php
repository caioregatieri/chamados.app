
<!-- <div class="form-group">
  {!! Form::label('user','Usuário:') !!}
  {!! Form::select('user', $users, (isset($call->user->id) ? $call->user->id : null ), ['class'=>'form-control']) !!}
</div>-->

<?php
  
  if (Auth::user()->usertype->administrator != "1") {
    $options = ['class'=>'form-control', 'readonly'=>'readonly'];
  }else{
    $options = ['class'=>'form-control'];
  }
?>

{!! Form::hidden('user', Auth::user()->id, ['class'=>'form-control']) !!}

<div class="form-group">
  {!! Form::label('mode','Tipo:') !!}
  {!! Form::select('mode', $modes, (isset($call->mode->id) ? $call->mode->id : null ), ['class'=>'form-control', 'autofocus'=>'true']) !!}
</div>  

<div class="form-group">
  {!! Form::label('departament','Secretaria:') !!}
  {!! Form::select('departament', $departaments, (isset($call->place->departament->id) ? $call->place->departament->id : Auth::user()->place->departament->id ), $options) !!}
</div>  

<div class="form-group">
  {!! Form::label('place','Setor:') !!}
  {!! Form::select('place', $places, (isset($call->place->id) ? $call->place->id : Auth::user()->place->id ), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <div class="col-sm-12 col-md-4 col-lg-4" style="padding: 0; margin-bottom: 15px;">
      {!! Form::label('requester','Solicitante:') !!}
      {!! Form::text('requester', (Auth::user()->usertype->administrator != "1" ? Auth::user()->name : null ), $options) !!}
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4" style="padding: 0; margin-bottom: 15px;">
      {!! Form::label('requester_email','E-mail:') !!}
      {!! Form::email('requester_email', (Auth::user()->usertype->administrator != "1" ? Auth::user()->email : null ), $options) !!}
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4" style="padding: 0; margin-bottom: 15px;">
      <?php
        $options = ['class'=>'form-control number'];
      ?>
      {!! Form::label('register','Chapa:') !!}
      {!! Form::text('register', (Auth::user()->usertype->administrator != "1" ? Auth::user()->register : null ), $options) !!}
    </div>
</div>

<div class="form-group">
  {!! Form::label('title','Titulo:') !!}
  {!! Form::text('title', null, ['class'=>'form-control ui-widget']) !!}
</div>

<div class="form-group">
  {!! Form::label('has_transfers','Transferências de patrimonio:') !!}
  {!! Form::checkbox('has_transfers', null, $call->has_transfers, []) !!}
</div>

<div class="form-group">
  {!! Form::label('description','Descrição:') !!}
  {!! Form::textarea('description', null, ['class'=>'ckeditor form-control']) !!}
</div>

<div class="form-group">
  <!-- <input type="checkbox" name="hastransfers"> Houve transferência de patrimonio. -->
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
