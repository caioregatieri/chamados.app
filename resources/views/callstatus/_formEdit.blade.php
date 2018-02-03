
<div class="form-group">
  {!! Form::label('name','Titulo:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('color','Cor de destaque:') !!}
  {!! Form::select('color', ['default'=>'Default','danger'=>'Danger','info'=>'Info','success'=>'Success','warning'=>'Warning'], null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('isstart', null, $callstatus->isstart, []) !!}
      É o inicio do atendimento
    </label>
  </div>
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('isend', null, $callstatus->isend, []) !!}
      É o fim do atendimento
    </label>
  </div>
</div>
