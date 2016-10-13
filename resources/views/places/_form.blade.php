
<div class="form-group">
  {!! Form::label('departament_id','Departament:') !!}
  {!! Form::select('departament_id', $departaments, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('prefix','Prefix:') !!}
  {!! Form::text('prefix', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('name','Name:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('neighborhood','Neighborhood:') !!}
  {!! Form::text('neighborhood', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('address','Address:') !!}
  {!! Form::text('address', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('number','Number:') !!}
  {!! Form::text('number', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('telephone1','Telephone 1:') !!}
  {!! Form::text('telephone1', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('telephone2','Telephone 2:') !!}
  {!! Form::text('telephone2', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('responsavel','Supervisor:') !!}
  {!! Form::text('responsavel', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('email','E-mail:') !!}
  {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('lat','Latitude:') !!}
  {!! Form::text('lat', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('lon','Longitude:') !!}
  {!! Form::text('lon', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('region','Region:') !!}
  {!! Form::select('region', ['Norte'=>'Norte','Sul'=>'Sul','Leste'=>'Leste','Oeste'=>'Oeste','Centro'=>'Centro'],null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('note','Note:') !!}
  {!! Form::textarea('note', null, ['class'=>'ckeditor form-control']) !!}
</div>
