@extends('main')

@section('title', '| Condomínio')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">
		
		<br>
      	<ol class="breadcrumb">
			<li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Condominio</li>			
		</ol>
      	<div class="row mt">
			<div class="col-md-12">
			  <div class="content-panel">
			      <table class="table table-striped table-advance table-hover">
			      		<div class="col-md-8">
			  	  	  		<h4><i class="fa fa-angle-right"></i> Condomínios</h4>
			  	  		</div>
			  	  		<div class="col-md-4">
							<a href="{{ route('condominio.create') }}" class="btn btn-primary pull-right">Criar Novo Condomínio</a>
						</div>

			  	  	  <br>
			          <thead>
				          <tr>
				              <th><i class="fa fa-building"></i> Condomínio</th>
				              <th> CNPJ</th>
				              <th class="hidden-phone"> Quantidade de Blocos</th>
				              <th class="hidden-phone"> Total de Apartamentos</th>
				              <th>Ações</th>
				          </tr>
			          </thead>
			          <tbody>
			          	@if($condominios)
			          		@foreach($condominios as $condominio)
					          <tr>
					              <td><a href="{{ route('condominio.show', $condominio->CONDOMINIO_CNPJ) }}">{{ $condominio->CONDOMINIO_NOME }}</a></td>
					              <td>{{ $condominio->CONDOMINIO_CNPJ }}</td>
					              <td class="hidden-phone">{{ $condominio->CONDOMINIO_QTDADE_BLOCO }}</td>
					              <td class="hidden-phone">
					              	@php
					              	$int = 0;
					              	foreach($condominio->blocos as $bloco)
					              	{
					              		$int += count($bloco->apartamentos);
					              	}
					              	@endphp
					              	{{ $int }}
					              </td>
					              <td>
					              	  <a href="{{ route('condominio.show', $condominio->CONDOMINIO_CNPJ) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i>Ver</a>                  
					                  <a href="{{ route('condominio.edit', $condominio->CONDOMINIO_CNPJ) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Editar</a>
					              </td>
					          </tr>
					         @endforeach
				        @else
				        	<tr>
				        		<td colspan="5">Não existe condomínios cadastrados</td>
				        	</tr>
				        @endif
			          </tbody>
			      </table>
			  </div><!-- /content-panel -->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->		
	</section>
@endsection