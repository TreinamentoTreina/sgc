@extends('main')

@section('title', '| Condomino')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">
		
		<br>
      	<ol class="breadcrumb">
			<li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Condomino</li>			
		</ol>
      	<div class="row mt">
			<div class="col-md-12">
			  <div class="content-panel">
			      <table class="table table-striped table-advance table-hover">
			      		<div class="col-md-8">
			  	  	  		<h4><i class="fa fa-angle-right"></i> Condominos</h4>
			  	  		</div>
			  	  		<div class="col-md-4">
							<a href="{{ route('condomino.create') }}" class="btn btn-primary pull-right">Adicionar Novo</a>
						</div>

			  	  	  <br>
			          <thead>
				          <tr>
				              <th> Nome</th>
				              <th class="hidden-phone"> CPF</th>
				              <th class="hidden-phone"> Email</th>
				              <th> Apartamento</th>
				              <th>Ações</th>
				          </tr>
			          </thead>
			          <tbody>
			          	@if($condominos)
			          	@php
			          	$i = 1;
			          	@endphp
			          		@foreach($condominos as $condomino)
					          <tr>
					              <td>{{ $condomino->CONDOMINO_NOME }}</td>
					              <td class="hidden-phone">{{ $condomino->CONDOMINO_CPF }}</td>
					              <td class="hidden-phone">{{ $condomino->CONDOMINO_EMAIL }}</td>
					              <td>
					              	{{ $condomino->apartamento->bloco->BLOCO_NOME }} - {{ $condomino->apartamento->APTO_NUMERO }}
					              </td>					              
					              <td>
					              	  <a href="{{ route('condomino.show', $condomino->CONDOMINO_CPF) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i> Ver</a>
					                  <a href="{{ route('condomino.edit', $condomino->CONDOMINO_CPF) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>

					                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalExcluir{{ $i }}"><i class="fa fa-trash "></i> Apagar</button>
										<div id="modalExcluir{{ $i }}" class="modal fade" role="dialog">
										  <div class="modal-dialog">

										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Solicitação de exclusão do condômino  <strong>{{ $condomino->CONDOMINO_NOME }} do Apartamento {{ $condomino->apartamento->bloco->BLOCO_NOME }} - {{ $condomino->apartamento->APTO_NUMERO }}</strong></h4>
										      </div>
										      <div class="modal-body">
										        <p>Tem certeza que deseja excluir o condômino?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <form method="POST" action="{{ route('condomino.destroy', $condomino->CONDOMINO_CPF) }}" accept-charset="UTF-8">
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
					          @php
					          $i++;
					          @endphp
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

@section('scripts')

@endsection