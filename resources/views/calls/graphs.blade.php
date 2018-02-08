@extends('template')

@section('title')
    Informações sobre os chamados
@endsection

@section('head')
    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}">

    <style>
        .huge {
            font-size: 40px;
        }

        .panel-success {
            border-color: #5cb85c;
        }

        .panel-success .panel-heading {
            border-color: #5cb85c;
            color: #fff;
            background-color: #5cb85c;
        }

        .panel-success a {
            color: #5cb85c;
        }

        .panel-success a:hover {
            color: #3d8b3d;
        }

        .panel-info {
            border-color: #337ab7;
        }

        .panel-info .panel-heading {
            border-color: #337ab7;
            color: #fff;
            background-color: #337ab7;
        }

        .panel-info a {
            color: #337ab7;
        }

        .panel-info a:hover {
            color: #164F80;
        }

        .panel-danger {
            border-color: #d9534f;
        }

        .panel-danger .panel-heading {
            border-color: #d9534f;
            color: #fff;
            background-color: #d9534f;
        }

        .panel-danger a {
            color: #d9534f;
        }

        .panel-danger a:hover {
            color: #b52b27;
        }

        .panel-warning {
            border-color: #f0ad4e;
        }

        .panel-warning .panel-heading {
            border-color: #f0ad4e;
            color: #fff;
            background-color: #f0ad4e;
        }

        .panel-warning a {
            color: #f0ad4e;
        }

        .panel-warning a:hover {
            color: #df8a13;
        }
    </style>
    <style>
        .page-header {
            padding: 0;
            margin: 0 0 10px 0;
        }
        .navbar, .sidebar, #rodape {
            display: none !important;
            visibility: hidden !important;
        }
        #page-wrapper {
            margin-left: 0 !important;
            margin-top: -50px;
        }
    </style>
@endsection

@section('content')          
    <!-- Calls details -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Informações sobre os chamados</h3>
        </div>
        @foreach($c['All'] as $call)
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-{{ $call->color }}">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa {{ $call->icon }} fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ $call->quantidade }}</div>
                                <div>{{ $call->name }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- <a href="{{ url('calls?status='.$call->id) }}">
                        <div class="panel-footer">
                            <span class="pull-left">Ver</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a> -->
                </div>
            </div>
        @endforeach
    </div>
    <!-- Graphs details -->
    <div class="row">
        <!-- Calls per month -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Ultimos 12 meses
                </div>
                <div class="panel-body">
                    <div id="morris-area-chart-1"></div>
                </div>
            </div>
        </div>

        <!-- Calls of month -->
        <!-- <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Mês atual
                </div>
                <div class="panel-body">
                    <div id="morris-area-chart-2"></div>
                </div>
            </div>
        </div> -->

        <!-- Calls per departament -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Chamados por secretaria
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                    <!-- No usage<a href="#" class="btn btn-default btn-block">View Details</a>-->
                </div>
            </div>
        </div>

        <!-- Calls per mode -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Chamados por tipo
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart2"></div>
                    <!-- No usage<a href="#" class="btn btn-default btn-block">View Details</a>-->
                </div>
            </div>
        </div>
    </div>
    <div id="display_refresh_message"></div> 
@endsection

@section('scripts')
    <!-- MorrisJs -->
    <script src="{{ asset('js/morris.js') }}"></script>
    <script src="{{ asset('js/raphael-min.js') }}"></script>

    <script>
        $( document ).ready(function() {
            Morris.Area({!! $l !!});
            // Morris.Area({!! $m !!});
            Morris.Donut({!! $p !!});
            Morris.Donut({!! $z !!});

            var interval = 0;
            var segundos = 30;
            
            setInterval(function(){
                interval++;
                $('#display_refresh_message').html( '<p>Atualizando em: <small>' + (segundos - interval) + '</small> sec.</p>' )
                if (interval >= segundos){
                    interval = 0;
                    //location.reload();
                    window.location.href = "{{ route('calls.monit') }}";
                }
            }, 1000)

            $('.btn-config').on('click', function(e){
                e.preventDefault();
                alert('disponível em breve');
            })
        });
  </script>
@endsection
