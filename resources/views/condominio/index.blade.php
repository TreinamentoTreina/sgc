@extends('main')

@section('title', '| Index')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">
		
		<br>
      	<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
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
					                  <a href="{{ route('condominio.edit', $condominio->CONDOMINIO_CNPJ) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
					                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o "></i></button>

										
										<div id="myModal" class="modal fade" role="dialog">
										  <div class="modal-dialog">

										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Solicitação de exclusão do condomínio <strong>{{ $condominio->CONDOMINIO_NOME }} - CNPJ: {{ $condominio->CONDOMINIO_CNPJ }}</strong></h4>
										      </div>
										      <div class="modal-body">
										        <p>Tem certeza que deseja excluir o Condomínio?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <form method="POST" action="{{ route('condominio.destroy', $condominio->CONDOMINIO_CNPJ) }}" accept-charset="UTF-8">
									            	<input name="_method" type="hidden" value="DELETE">
									            	{{ csrf_field() }}
									            	<input class="btn btn-danger pull-right" type="submit" value="Excluir">
									            </form>
										      </div>
										    </div>

										  </div>
										</div>
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