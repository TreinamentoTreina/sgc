@extends('main')

@section('title', '| Ver Condominio')

@section('content')

	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Condomínio
        <small>Visualizar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Condominio</a></li>
        <li class="active">Visualizar</li>
      </ol>
    </section>
    
    <section class="content">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="box box-widget widget-user">
    				<div class="widget-user-header bg-black" style="background: url({{ asset('dist/img/photo1.png') }}) center center;">
    					<h3 class="widget-user-username">{{ $condominio->CONDOMINIO_NOME }}</h3>
    					<h5 class="widget-user-desc">{{ $condominio->CONDOMINIO_CNPJ }}</h5>
    				</div>
    				<div class="widget-user-image">
    					<img class="img-circle" src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar">
    				</div>
		            <div class="box-footer">
		              <div class="row">
		                <div class="col-sm-4 border-right">
		                  <div class="description-block">
		                    <h5 class="description-header">{{ $condominio->CONDOMINIO_QTDADE_BLOCO }}</h5>
		                    <span class="description-text">Quantidade de Blocos</span>
		                  </div>
		                </div>
		                <div class="col-sm-4 border-right">
		                  <div class="description-block">
		                    <h5 class="description-header">{{ $condominio->blocos[0]->BLOCO_QTDADE_APTO_POR_ANDAR }}</h5>
		                    <span class="description-text">Quantidade de Apto por Bloco</span>
		                  </div>
		                </div>
		                <div class="col-sm-4">
		                  <div class="description-block">
		                    <h5 class="description-header">{{ count($total) }}</h5>
		                    <span class="description-text">Total de Apartamentos</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		        </div>
		    </div>
		</div>

		@if($condominio->blocos)

			<div class="row">
				@foreach($condominio->blocos as $bloco)
					
		            <div class="col-sm-6 col-md-4">
		                <div class="thumbnail">

			                <div class="form-group">
			                    <div class="col-md-12">
			                        <br>
			                        <div class="col-md-6">
			                            <i class="fa fa-building-o fa-2x"></i>
			                            <label>Bloco</label>
			                        </div>
			                        <div class="col-md-6">
			                            <input class="form-control" value="{{ $bloco->BLOCO_NOME }}" readonly>
			                        </div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <div class="col-md-12">
			                        <br>
			                        <div class="col-md-6">
			                            <i class="fa fa-list-ol fa-2x"></i>
			                            <label>Andares</label>
			                        </div>
			                        <div class="col-md-6">
			                            <input class="form-control" value="{{ $bloco->BLOCO_QTDADE_ANDARES }}" readonly>
			                        </div>
			                    </div>
			                </div>

			                <div class="col-md-12">
			                    <legend></legend>
			                </div>
			                
			                @if($bloco->apartamentos)
			                	@foreach($bloco->apartamentos as $apto)
					                <div class="col-md-12" style="background-color: #cccccc; padding: 5px; margin: 1px;">
					                    <div class="col-md-6">
					                        <label>Apartamento - {{ $apto->APTO_NUMERO }}</label>
					                    </div>
					                    <div class="col-md-3">
					                    	<!--
					                        <button class="btn btn-default"><i class="fa fa-trash"></i></button>
					                        <button class="btn btn-default"><i class="fa fa-check"></i></button>
					                    	-->
					                    </div>
					                    <div class="col-md-3" align="right">
					                        <button class="btn btn-circle btn-success"><i class="fa fa-angle-double-right"></i></button>
					                    </div>
					                </div>
					                

					                <div class="form-group">
					                    <div class="row">
					                        
					                    </div>
					                </div>
					            @endforeach
			                @endif
		                


		                </div>
		            </div>            
		        @endforeach
		    </div>
        @endif
            
	</section>


    

@endsection