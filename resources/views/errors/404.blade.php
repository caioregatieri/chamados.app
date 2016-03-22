@extends('template')

@section('title')
Page not found
@endsection

@section('head')
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
      html, body {
          height: 100%;
      }
      body {
          margin: 0;
          padding: 0;
          width: 100%;
      }
      .title {
          display: table;
          font-weight: 100;
          font-family: 'Lato';
          text-align: center;
          display: table-cell;
          vertical-align: middle;
      }
      .content {
          text-align: center;
          display: inline-block;
      }
      .title {
          border: 0;
          font-size: 96px;
      }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="title">Page not found - Be right back</div>
    </div>
@endsection