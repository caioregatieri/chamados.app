
<div class="form-group">
  {!! Form::label('name','Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('usertype_id','User Type:') !!}
  {!! Form::select('usertype_id', $usertypes, $user->usertype_id, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('departament_id','Departament:') !!}
  {!! Form::select('departament_id', $departaments, $user->place->departament_id, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('place_id','Place:') !!}
  {!! Form::select('place_id', $places, $user->place_id, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('register','Register:') !!}
  {!! Form::text('register', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('email','E-mail:') !!}
  {!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>
