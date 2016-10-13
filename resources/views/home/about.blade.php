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
          display: table-cell;
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
  <div class="panel panel-default noborder">
    <div class="row row-centered">
      <div class="col-md-9 col-centered">
        <div class="title">
          Sistema de controle de chamados técnicos.<br/>
          Desenvolvido por: <a href="mailto:caio.cesar.regatieri">Caio Regatieri</a>.<br/>
          Usando PHP (Laravel), Bootstrap e Sqlite.<br/><br/>
          <b>Por que em Inglês?</b><br/>
          <ol>
            <li>Porque eu gosto.</li>
            <li>Porque todos deviam saber.</li>
            <li>Porque é a lingua que possue mais material para estudo.</li>
            <li>Porque sim!</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
