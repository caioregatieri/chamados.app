@extends('template')

@section('title')
Home
@endsection

@section('head')
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
@endsection

@section('content')

@if(Auth::user()->usertype->administrator == "1")

<!-- Row title -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><a href="{!! url('calls') !!}">All calls details</a></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- Calls details -->
<div class="row">
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
          <a href="{{ url('calls?status='.$call->id) }}">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
  @endforeach
</div>
<!-- /Calls details -->
<!-- /.row -->

@endif

<!-- Row title -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><a href="{!! url('calls?user='.Auth::user()->id) !!}">Yours calls details</a></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- Calls details -->
<div class="row">
  @foreach($c['Owner'] as $call)
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
          <a href="{{ url('calls?status='.$call->id.'&user='.Auth::user()->id) }}">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
  @endforeach
</div>
<!-- /Calls details -->
<!-- /.row -->

<!-- Row title -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">More calls details</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- Graphs -->
<div class="row">
    <!-- Calls per day -->
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Calls per month
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>

    </div>
    <!-- /.col-lg-4 -->

    <!-- Calls per departament -->
    <div class="col-lg-4">
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Calls per departament
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
                <!-- No usage<a href="#" class="btn btn-default btn-block">View Details</a>-->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.col-lg-4 -->

    <!-- Calls per mode -->
    <div class="col-lg-4">
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Calls per mode
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart2"></div>
                <!-- No usage<a href="#" class="btn btn-default btn-block">View Details</a>-->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /Graphs -->
<!-- /.row -->
@endsection


@section('scripts')
<script>
    $(function(){
      Morris.Area({!! $l !!});
      Morris.Donut({!! $p !!});
      Morris.Donut({!! $z !!});
    });
</script>
@endsection
