
<div class="form-group">
  {!! Form::label('name','* Nome:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('usertype_id','* Tipo:') !!}
  {!! Form::select('usertype_id', $usertypes, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('departament_id','* Secretaria:') !!}
  {!! Form::select('departament_id', $departaments, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('place_id','* Setor:') !!}
  {!! Form::select('place_id', $places, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('register','* Chapa:') !!}
  {!! Form::text('register', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('email','* E-mail:') !!}
  {!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('note','Observação:') !!}
  {!! Form::textarea('note', null, ['class'=>'ckeditor form-control']) !!}
</div>
