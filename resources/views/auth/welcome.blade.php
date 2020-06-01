@extends('auth.template')

@section('title')
Chamados
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
      /* centered columns styles */
      .row-centered {
          text-align:center;
      }
      .col-centered {
          display:inline-block;
          float:none;
          /* reset the text-align */
          text-align:left;
          /* inline-block space fix */
          margin-right:-4px;
      }
      .panel {
          border: none;
          box-shadow: none;
      }

  </style>
@endsection

@section('content')
  <div class="panel panel-default" >
    <div class="row row-centered" >
      <div class="col col-md-9 col-centered">
        <div class="title" >
          <b>Chamados Técnicos</b><br/>
        </div>
      </div>
    </div>
  </div>
@endsection
