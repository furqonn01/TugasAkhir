@extends('layouts.induk')
@section('konten')
<!-- Content Row -->
<!-- Resources -->
<script src="{{ asset('amChart/core.js') }}"></script>
<script src="{{ asset('amChart/chart.js') }}"></script>
<script src="{{ asset('amChart/animated.js') }}"></script>
<!-- HTML -->
<script>
    am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
chart.data = [ {
"country": "Laki-laki",
"litres": {{$lk}}
}, {
"country": "Perempuan",
"litres": {{$pr}}
}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#F0F8FF");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

}); // end am4core.ready()
</script>
<div class="card body p-3 m-1">
    <div class="row">
        <div class="col-5">
            <h3 class="text-muted mb-4">Detail</h3>
            <div class="row">
                <div class="col-6">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admin</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$total_user}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-6">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pegawai</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_pegawai}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laki-laki
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$lk}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-male fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-6">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Perempuan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pr}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-female fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card body p-2 col-7">
            <div class="text-muted">Perbandingan Laki dan Perempuan</div>
            <div id="chartdiv"></div>
        </div>
    </div>
    <h6 class="text-muted">{{$now}}</h6>
    <!-- /.container-fluid -->

    @endsection
