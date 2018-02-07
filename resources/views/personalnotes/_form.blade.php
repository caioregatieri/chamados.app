
{!! Form::hidden('user_id', auth()->user()->id ) !!}

<div class="form-group">
  {!! Form::label('title','Titulo:') !!}
  {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('description','Descrição:') !!}
  {!! Form::textarea('description', null, ['class'=>'ckeditor form-control']) !!}
</div>
