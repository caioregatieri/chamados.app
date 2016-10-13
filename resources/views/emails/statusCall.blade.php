<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <style type="text/css">

      * {
        margin: 0;
        padding: 0;
        font-size: 100%;
        font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        line-height: 1.65; }

      img {
        max-width: 100%;
        margin: 0 auto;
        display: block; }

      body,
      .body-wrap {
        width: 100% !important;
        height: 100%;
        background: #efefef;
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none; }

      a {
        color: #71bc37;
        text-decoration: none; }

      .text-center {
        text-align: center; }

      .text-right {
        text-align: right; }

      .text-left {
        text-align: left; }

      .button {
        display: inline-block;
        color: white;
        background: #71bc37;
        border: solid #71bc37;
        border-width: 10px 20px 8px;
        font-weight: bold;
        border-radius: 4px; }

      h1, h2, h3, h4, h5, h6 {
        margin-bottom: 20px;
        line-height: 1.25; }

      h1 {
        font-size: 32px; }

      h2 {
        font-size: 28px; }

      h3 {
        font-size: 24px; }

      h4 {
        font-size: 20px; }

      h5 {
        font-size: 16px; }

      p, ul, ol {
        font-size: 16px;
        font-weight: normal;
        margin-bottom: 20px; }

      .container {
        display: block !important;
        clear: both !important;
        margin: 0 auto !important;
        max-width: 580px !important; }
        .container table {
          width: 100% !important;
          border-collapse: collapse; }
        .container .masthead {
          padding: 80px 0;
          background: #71bc37;
          color: white; }
          .container .masthead h1 {
            margin: 0 auto !important;
            max-width: 90%;
            text-transform: uppercase; }
        .container .content {
          background: white;
          padding: 30px 35px; }
          .container .content.footer {
            background: none; }
            .container .content.footer p {
              margin-bottom: 0;
              color: #888;
              text-align: center;
              font-size: 14px; }
            .container .content.footer a {
              color: #888;
              text-decoration: none;
              font-weight: bold; }

    </style>
</head>
<body>
<table class="body-wrap">
    <tr>
        <td class="container">
            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">
                        <h1>Chamados técnicos</h1>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <h2>Olá,</h2>
                        <p>Um chamado técnico foi aberto para seu setor. Seguem abaixo alguns detalhes:</p>
                        <p>Código: <b> {!! $call->id !!} </b></p>
                        <p>Data: <b> {!! $call->created_at !!} </b></p>
                        <p>Aberto por: <b> {!! $call->user->name !!} </b></p>
                        <p>Titulo: <b> {!! $call->title !!} </b></p>
                        <p>Detalhes: <b> {!! $call->description !!} </b></p>
                        <hr/>
                        <p>Situação: <b> {!! $call->history->last()->status->name !!} </b></p>
                        <p>Executado: <b> {!! $call->history->last()->description !!} </b></p>
                        <p>Data: <b> {!! $call->history->last()->created_at !!} </b></p>
                        <p>Realizado por: <b> {!! $call->history->last()->user->name !!} </b></p>
                        <br/>
                        @if($call->history->last()->status->isend != 'on')
                          <p>Você será alertado(a) sobre cada atualização deste chamado.</p>
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="container">
            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                        <p>Contato: <a href="mailto:suportesme@franca.sp.gov.br">suportesme@franca.sp.gov.br</a> - 3711-9380</p>
                        <p>Setor de Informática - Secretaria da Educação</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
