@extends('main')

@section('title', '| Dashboard')

@section('stylesheets')
<!-- Folha de Estilo da Aplicação -->
<link rel="stylesheet" href="{{ asset('css/sgc.css') }}" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset('morrisjs/morris.css') }}" type="text/css" media="all">
@endsection

@section('content')
	<section class="wrapper site-min-height">		
		<br>
      	<ol class="breadcrumb">
			<li class="active"><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>				
		</ol>

		<h3><i class="fa fa-angle-right"></i> Dashboard</h3>

		<div class="row mt">
      		<div class="col-lg-12 col-md-12">
	            <div class="row">
	                <div class="col-lg-4 col-md-6">
	                    <div class="panel panel-primary">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="fa fa-building-o fa-5x"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">500</div>
	                                    <div>Apartamentos</div>
	                                </div>
	                            </div>
	                        </div>
	                        <a href="#">
	                            <div class="panel-footer">
	                                <span class="pull-left">Ver mais</span>
	                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>
	                        
	                    </div>
	                </div>
	                <div class="col-lg-4 col-md-6">
	                    <div class="panel panel-green">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="fa fa-minus-square fa-5x"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">132</div>
	                                    <div>Unidades Vazias</div>
	                                </div>
	                            </div>
	                        </div>
	                        <a href="#">
	                            <div class="panel-footer">
	                                <span class="pull-left">Ver mais</span>
	                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	                <div class="col-lg-4 col-md-6">
	                    <div class="panel panel-yellow">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="fa fa-usd fa-5x"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">132</div>
	                                    <div>Unidades em Atraso</div>
	                                </div>
	                            </div>
	                        </div>
	                        <a href="#">
	                            <div class="panel-footer">
	                                <span class="pull-left">Ver mais</span>
	                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	                <div class="col-lg-4 col-md-6">
	                    <div class="panel panel-red">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="fa fa-tint fa-5x"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">R$ 26.152,89</div>
	                                    <div>Gasto com Agua</div>
	                                </div>
	                            </div>
	                        </div>
	                        <a href="#">
	                            <div class="panel-footer">
	                                <span class="pull-left">Ver mais</span>
	                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	                <div class="col-lg-4 col-md-6">
	                    <div class="panel panel-primary">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="fa fa-bolt fa-5x"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">R$ 90.587,00</div>
	                                    <div>Gasto com Energia</div>
	                                </div>
	                            </div>
	                        </div>
	                        <a href="#">
	                            <div class="panel-footer">
	                                <span class="pull-left">Ver mais</span>
	                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	                <div class="col-lg-4 col-md-6">
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="fa fa-university fa-5x"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge">30</div>
	                                    <div>Reuniões</div>
	                                </div>
	                            </div>
	                        </div>
	                        <a href="#">
	                            <div class="panel-footer">
	                                <span class="pull-left">Ver mais</span>
	                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	            </div>
	            <!-- /.row -->
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            <i class="fa fa-bar-chart-o fa-fw"></i> Reservas                            
	                        </div>
	                       
	                       	<table width="60%" align="center">
	                       		<tr>
	                       			<td>
	                       				<canvas id="GraficoLine" style="width:80%;"></canvas>
	                       			</td>
	                       		</tr>
	                       	</table>
	                    </div>
	                </div>
	            </div>
        	</div>
    	</div>
	</section>
@endsection

@section('scripts')
<script src="{{ asset('morrisjs/morris.min.js') }}"></script>

<script type="text/javascript">
    var options = {
        responsive:true
    };

    var data = {
        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        datasets: [            
            {
                label: "Dados secundários",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [13, 4, 16, 11, 7, 5, 2, 15, 10, 8, 15, 16]
            }
        ]
    };               
    
    window.onload = function(){

        var ctx = document.getElementById("GraficoLine").getContext("2d");
        var LineChart = new Chart(ctx).Line(data, options);
    }  	
</script>

@endsection