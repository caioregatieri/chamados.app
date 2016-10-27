@extends('template')

@section('title')
Log de logins
@endsection

@section('head')
  <link rel="stylesheet" href="{{ asset('css/daterangepicker.css')}}" />
@endsection

@section('content')
    <br/>
    <br/>

    <div class="panel panel-default">
      <div class="panel-heading">Filter and search</div>
      <div class="panel-body">
        <form class="navbar-form navbar-left" role="search">
          
          <div class="form-group">
            <input name="created_at" type="text" class="form-control" placeholder="" />
          </div>
          
          <div class="form-group">
              <select class="form-control" name="user">
                <option value="" disabled selected>User</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
          </div>

          <button type="submit" class="btn btn-default">Search</button>

        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Logins - Total: {{ $logins->total() }}</div>

      <!-- Table -->
      <table class="table">
          <tr>
            <th>Date</th>
            <th>User</th>
            <th>IP</th>
            <th>Method</th>
          </tr>
          @foreach($logins as $login)
              <tr>
              <td>{{ $login->created_at }}</td>
              <td>{{ $login->user->name }}</td>
              <td>{{ $login->ip }}</td>
              <td>{{ $login->method }}</td>
            </tr>
          @endforeach
      </table>

    </div>

    {!! $logins->render() !!}

@endsection

@section('scripts')
  <script src="{{ asset('js/moment.min.js') }}"></script>
  <script src="{{ asset('js/daterangepicker.js') }}"></script>
  <script type="text/javascript">
      $('input[name="created_at"]').daterangepicker({
        locale: {
          format: 'DD/MM/YYYY'
        }
      });
  </script>
@endsection
