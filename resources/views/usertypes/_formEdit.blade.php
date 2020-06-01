
<div class="form-group">
  {!! Form::label('name','* Nome:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('administrator', null, $usertype->administrator, []) !!}
      Administrador
    </label>
  </div>
</div>

<div class="form-group">
  <div class="checkbox">
    <label>
      {!! Form::checkbox('onlyyourplace', null, $usertype->onlyyourplace, []) !!}
      Ver somente seus chamados
    </label>
  </div>
</div>
