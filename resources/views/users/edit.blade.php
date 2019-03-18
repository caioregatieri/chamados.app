@extends('template')

@section('title')
Editar usuário
@endsection

@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Editando usuário: {{ $user->id }}</h3>
  </div>
  <div class="panel-body">

    {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'post']) !!}

      @include('users._formEdit')

      <div class="form-group">
        <div class="checkbox">
          <label>
            {!! Form::checkbox('Bloqueado', null, $user->locked, []) !!}
            Locked
          </label>
        </div>
      </div>

      <div class="form-group">
        <a href="{{ route('users.password.edit',['id'=>$user->id]) }}" class="btn btn-primary">Redefinir senha</a>
      </div>

      <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>

    {!! Form::close() !!}
  </div>
</div>

@endsection
