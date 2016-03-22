
<div class="form-group">
  {!! Form::label('name','Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('color','Accent color:') !!}
  {!! Form::select('color', ['default'=>'Default','danger'=>'Danger','info'=>'Info','success'=>'Success','warning'=>'Warning'], null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('isstart', null, $usertype->isstart, []) !!}
      Is start the call
    </label>
  </div>
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('isend', null, $usertype->isend, []) !!}
      Is end the call
    </label>
  </div>
</div>
