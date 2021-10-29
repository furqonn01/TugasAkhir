@extends('layouts.induk')
@section('konten')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br />
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <!-- Resources -->
    <script src="{{ asset('amChart/core.js') }}"></script>
    <script src="{{ asset('amChart/chart.js') }}"></script>
    <script src="{{ asset('amChart/animated.js') }}"></script>

    <!-- Chart code -->
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
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;

    // This creates initial animation
    pieSeries.hiddenState.properties.opacity = 1;
    pieSeries.hiddenState.properties.endAngle = -90;
    pieSeries.hiddenState.properties.startAngle = -90;

    });
    </script>
    <script>
        am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("pie", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

chart.data = [
  {
    country: "Menikah",
    litres: {{$menikah}}
  },
  {
    country: "Belum Menikah",
    litres: {{$bmenikah}}
  },
];

chart.innerRadius = 100;

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.category = "country";

}); // end am4core.ready()
    </script>
    <script>
        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("status", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();

        chart.data = [
          {
            country: "Aktif",
            litres: {{$aktif}}
          },
          {
            country: "Pindah",
            litres: {{$pindah}}
          },
          {
            country: "pensiun",
            litres: {{$pensiun}}
          },
          {
            country: "Meninggal",
            litres: {{$meninggal}}
          }
        ];

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "litres";
        series.dataFields.category = "country";

        }); // end am4core.ready()
    </script>

    <!-- HTML -->
    <div class="card p-3">
        <h2>
            <h4>Perbandingan Pegawai Laki-Laki dan Perempuan</h4>
        </h2>
        <div class="col-12">
            <div id="chartdiv" style="width: 100% ; height: 480px;""></div>
        </div>
        <div class=" text-muted">
                <h4>Jumlah Pegawai = {{$tot}}</h4>
            </div>
        </div>
        <div class="card p-3 mt-2">
            <h2>
                <h4>Perbandingan Pegawai Sudah Menikah dan Belum Menikah</h4>
            </h2>
            <div class="row">
                <div class="col-7">
                    <div id="pie" style=" width: 100%;
                    height: 400px;"></div>
                </div>
                <div class="col-5 mt-5">
                    <div class="row p-2">
                        <h4 class="text-muted">Total pegawai : {{$tot}}</h4>
                    </div>
                    <div class="p-2 row">
                        <h6 class="text-muted">Total pegawai yang telah menikah : {{$menikah}}</h6>
                        <h6 class="text-muted">Total pegawai yang belum menikah : {{$bmenikah}}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-2">
            <h2>
                <h4>Perbandingan Status Pegawai</h4>
            </h2>
            <div class="row">
                <div class="col-7">
                    <div id="status" style=" width: 100%;
                    height: 400px;"></div>
                </div>
                <div class="col-5 mt-5">
                    <h4 class="text-muted">Total pegawai : {{$tot}}</h4>
                    <div class="p-2">
                        <h6 class="text-muted">Total pegawai yang aktif : {{$aktif}}</h6>
                        <h6 class="text-muted">Total pegawai yang pindah : {{$pindah}}</h6>
                        <h6 class="text-muted">Total pegawai yang pensiun : {{$pensiun}}</h6>
                        <h6 class="text-muted">Total pegawai yang meninggal : {{$meninggal}}</h6>
                    </div>
                </div>
            </div>
        </div>

        <br>
        @endsection
