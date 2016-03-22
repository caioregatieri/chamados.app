
<div class="form-group">
  {!! Form::label('name','Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('color','Color:') !!}
  {!! Form::select('color', ['default'=>'Default','danger'=>'Danger','info'=>'Info','success'=>'Success','warning'=>'Warning'], null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('isstart', null, $callstatus->isstart, []) !!}
      Is start the call
    </label>
  </div>
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('isend', null, $callstatus->isend, []) !!}
      Is end the call
    </label>
  </div>
</div>
