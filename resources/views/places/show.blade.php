@extends('template')

@section('title')
Show place
@endsection

@section('styles')
<style>
  #mapa{
    width: 100%;
    height: 300px;
    border: 1px solid #ccc;
    border-radius: 7px;
  }
  #mapa img{
    height: 100%; 
    width: 100%;
    border-radius: 7px; 
  }
</style>
@endsection

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Details</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6">
        <b>Id:</b> {{$place->id}} <br/>
        <b>Criado em:</b>  {{$place->created_at}}<br/>
        <b>Secretaria:</b> {{$place->Departament->name}} <br/>
        <b>Prefixo:</b> {{$place->prefix}} <br/>
        <b>Nome:</b> {{ $place->name }} <br/>
        <b>Logradouro:</b> {{$place->address}} <br/>
        <b>Numero:</b> {{$place->number}} <br/>
        <b>Bairro:</b> {{$place->neighborhood}} <br/>
        <b>Região:</b> {{$place->region}} <br/>
        <b>Telefone1:</b> {{$place->telephone1}} <br/>
        <b>Telefone2:</b> {{$place->telephone2}} <br/>
        <b>Chefia/responsavel:</b> {{$place->responsavel}} <br/>
        <b>E-mail:</b> {{$place->email}} <br/>
        <b>Observações:</b>
        <div>
          {!! $place->note !!}
        </div>
      </div>
      <div class="col-md-6">
        <div id="mapa" style="height: 350px; border-radius: 10px;"></div>
      </div>
    </div>
    <br/>
    @if($place->logs->count() > 1)
      <b>Houveram modificações neste registro</b>
    @endif
    <br/>
    <a href="{{ route('places.index') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Voltar</a>
    <a href="{{ route('places.edit',['id'=>$place->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
  </div> 
</div>

@endsection

@section('scripts')
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCLwJ1rSXCuLcoi8E-IfvhduUatvjQs6c8"></script>


  <script type="text/javascript">
    var map = null;

    (function carregar(){

      var latitude =  {{ $place->lat != '' ? $place->lat : 0 }};
      var longitude = {{ $place->lon != '' ? $place->lon : 0 }};

      if ((latitude == 0) || (longitude == 0)){
        var imagem = "<img src='{!! asset('img/maps-default.png') !!}' />"
        document.getElementById("mapa").innerHTML = imagem;
        return;
      }

    	var latlng = new google.maps.LatLng(latitude, longitude);

    	var myOptions = {
    	   zoom: 17,
    	   center: latlng,
    	   mapTypeId: google.maps.MapTypeId.ROADMAP
    	};

    	//criando o mapa
    	map = new google.maps.Map(document.getElementById("mapa"), myOptions);

    	var praca = new google.maps.LatLng(latitude, longitude);
    	marcadorPraca = new google.maps.Marker({
    		position: praca,
    		map: map,
    		title: "{!! $place->name !!}",
    		icon: '{!! asset('img/point.png') !!}'
    	});
    })();

  </script>
@endsection
