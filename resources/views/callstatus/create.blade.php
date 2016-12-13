@extends('template')

@section('title')
New call status
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
    <h3 class="panel-title">New call status</h3>
  </div>
  <div class="panel-body">

    {!! Form::open(['route'=>'callstatus.store', 'method'=>'post']) !!}

      @include('callstatus/_formCreate')

      <a href="{{ route('callstatus.index') }}" class="btn btn-default">Back</a>
      {!! Form::submit('Save',['class'=>'btn btn-success bt-save']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#form').submit(function(){
        $('.btn-save').prop('disabled', true);
      });
    }
  </script>
@endsection