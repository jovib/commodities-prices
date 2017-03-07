@extends('layouts.default')

@section('content')
    <div id="wrapper">
        @include('partials.navbar')

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Precio del Petroleo</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Estado
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>Valor</th>
                                            <th>Fecha</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($oil as $key=>$value)
                                        <tr>
                                            <td>{{$value->Value}}</td>
                                            <td>{{$value->Date}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="alert alert-info" role="alert">
                        <p>Todos los valores son unidades monetarias nacionales por onza. Acumulado del año en curso</p>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Gráfica
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--div id="silver-chart"></div-->
                                    <div>
                                        <canvas id="canvas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            scrollX: false,
            searching: false,
            pageLength: 7,
            lengthChange: false,
            pagingType: 'simple',
            info: false,
            "order": [[1, "desc"]]
        });
    });
</script>
<script>
var color = Chart.helpers.color;
var barChartData = {
    labels: [
        @foreach($oil as $key=>$value)
            '{{date('Y F j', strtotime($value->Date) )}}',
        @endforeach
    ],
    datasets: [{
        type: 'line',
        pointRadius: 0,
        label: 'Petroleo',
        backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
        borderColor: window.chartColors.blue,
        data: [
        @foreach($oil as $key=>$value)
        {{$value->Value}},
        @endforeach
        ]
    }]
};

window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    display: false
                }]
            }
        }
    });
};
</script>
@stop