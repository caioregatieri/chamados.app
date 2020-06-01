@extends('template')

@section('title')
Chamados
@endsection

@section('head')
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>

  <style>
      html, body {
          height: 100%;
      }
      body {
          margin: 0;
          padding: 0;
          width: 100%;
      }
      .content {
          margin: 0 auto;
          text-align: center;
          display: inline-block;
      }
      .title {
          font-size: 36px;
          font-weight: 100;
          font-family: 'Josefin Sans', sans-serif;
          text-align: center;
          /*display: table-cell;*/
          vertical-align: middle;
          border: 0;
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
      .noborder {
          border: none;
          box-shadow: none;
      }
      .panel.noborder > .panel-heading {
          border: 1px solid #dddddd;
          border-radius: 0;
      }
  </style>
@endsection

@section('content')
  <div class="panel panel-default noborder" style="text-align: center;">
      <div class="title" style="margin: 0 auto;">
        Sistema de controle de chamados técnicos.<br/>
        Desenvolvido por: <a href="mailto:caio.cesar.regatieri">Caio Regatieri</a>.<br/>
        Usando PHP (Laravel), Bootstrap e Mysql.
      </div>
  </div>
  <br/>
  <br/>
@endsection
