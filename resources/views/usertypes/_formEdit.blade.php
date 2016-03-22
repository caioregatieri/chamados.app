
<div class="form-group">
  {!! Form::label('name','Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('administrator', null, $usertype->administrator, []) !!}
      Administrator
    </label>
  </div>
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('onlyyourplace', null, $usertype->onlyyourplace, []) !!}
      Calls only for your site
    </label>
  </div>
</div>
