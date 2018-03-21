@extends('main')

@section('title', '| Assunto')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">
		
		<br>
      	<ol class="breadcrumb">
			<li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Assunto</li>			
		</ol>
      	<div class="row mt">
			<div class="col-md-12">

				<form class="form-horizontal" action="{{ route('assunto.store') }}" method="POST">{{ csrf_field() }}
		          <div class="box-body">
		            <div class="form-group">
		              <label for="condominio" class="col-sm-2 control-label">Assunto</label>

		              <div class="col-sm-6">
		                <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Segurança" required>
		              </div>

		              <div class="col-sm-2">
		                <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
		              </div>
		            </div>		            
		          </div>	          		          
		        </form>

				<div class="content-panel">
				  <table class="table table-striped table-advance table-hover">
				  		<div class="col-md-8">
				  	  		<h4><i class="fa fa-angle-right"></i> Assuntos</h4>
				  		</div>					  		

					  	  <br>
				      <thead>
				          <tr>
				          	  <th width="10%"> Numero</th>
				              <th width="70%"> Assunto</th>
				              <th width="20%"> Ações</th>
				          </tr>
				      </thead>
				      <tbody>
				      	@if(count($assuntos) > 0)
				      		@php
				      		$i = 1;
				      		@endphp
				      		@foreach($assuntos as $assunto)
					          <tr>
					              <td>{{ $assunto->ASSUNTO_ID }}</td>
					              <td>{{ $assunto->ASSUNTO_DESCRICAO }}</td>
					              <td>
					                  <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-editar<?php echo $i;?>"><i class="fa fa-pencil"></i> Editar</a>

			                  			<div class="modal modal-default fade" id="modal-editar<?php echo $i;?>">
								          <div class="modal-dialog modal-lg">
								            <div class="modal-content">
								              <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                  <span aria-hidden="true">&times;</span></button>
								                <h4 class="modal-title">Editando o Assunto - <strong>{{ $assunto->ASSUNTO_DESCRICAO }}</strong></h4>
								              </div>

								              <form action="{{ route('assunto.update', $assunto->ASSUNTO_ID) }}" method="post"><input name="_method" type="hidden" value="PUT">{{ csrf_field() }}
									              <div class="modal-body">

											        <div class="form-group">
									              		<div class="row">
										              		<div class="col-md-3" align="right">
										                		<label>Assunto</label>
										            		</div>
										            		<div class="col-sm-9">
										                		<input class="form-control" name="assunto" value="{{ $assunto->ASSUNTO_DESCRICAO }}" required="true">
										            		</div>
										            	</div>
											        </div>
										            
									              </div>

									              <div class="modal-footer">
									                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
									                <button type="submit" class="btn btn-success">Gravar</button>
									              </div>
								              </form>

								            </div> <!-- /.modal-content -->							            
								          </div> <!-- /.modal-dialog -->							          
								        </div>

					                  <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir<?php echo $i;?>"><i class="fa fa-trash"></i> Apagar</a>

			                  			<div class="modal modal-default fade" id="modal-excluir<?php echo $i;?>">
								          <div class="modal-dialog">
								            <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Solicitação de exclusão do Assunto <strong>{{ $assunto->ASSUNTO_DESCRICAO }}</strong></h4>
										      </div>
										      <div class="modal-body">
										        <p>Tem certeza que deseja excluir este Assunto?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <form method="POST" action="{{ route('assunto.destroy', $assunto->ASSUNTO_ID) }}" accept-charset="UTF-8">
									            	<input name="_method" type="hidden" value="DELETE">
									            	{{ csrf_field() }}
									            	<input class="btn btn-danger pull-right" type="submit" value="Excluir">
									            </form>
										      </div>
										    </div>
								          </div>
								          <!-- /.modal-dialog -->
								        </div>
					              </td>
					          </tr>
					          @php
					          $i++;
					          @endphp
					         @endforeach
				        @else
				        	<tr>
				        		<td colspan="5" align="center">Não existe condomínios cadastrados</td>
				        	</tr>
				        @endif
				      </tbody>
				  </table>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')

@endsection