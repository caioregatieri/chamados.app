
<div class="form-group">
  {!! Form::label('name','Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('administrator', null, null, []) !!}
      Administrator
    </label>
  </div>
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('onlyyourplace', null, null, []) !!}
      Calls only for your site
    </label>
  </div>
</div>
