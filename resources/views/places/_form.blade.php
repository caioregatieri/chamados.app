
<div class="form-group">
  {!! Form::label('departament_id','Secretaria:') !!}
  {!! Form::select('departament_id', $departaments, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('prefix','Prefixo:') !!}
  {!! Form::text('prefix', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('name','Nome:') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('neighborhood','Bairro:') !!}
  {!! Form::text('neighborhood', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('address','Logradouro:') !!}
  {!! Form::text('address', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('number','Numero:') !!}
  {!! Form::text('number', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('telephone1','Telefone 1:') !!}
  {!! Form::text('telephone1', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('telephone2','Telefone 2:') !!}
  {!! Form::text('telephone2', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('responsavel','Chefia/Responsavel:') !!}
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
  {!! Form::label('region','Região:') !!}
  {!! Form::select('region', ['Norte'=>'Norte','Sul'=>'Sul','Leste'=>'Leste','Oeste'=>'Oeste','Centro'=>'Centro'],null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('note','Observações:') !!}
  {!! Form::textarea('note', null, ['class'=>'ckeditor form-control']) !!}
</div>
