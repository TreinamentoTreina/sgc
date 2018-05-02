@extends('main')

@section('title', '| Area Comum')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">
		
		<br>
      	<ol class="breadcrumb">
			<li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Area Comum</li>			
		</ol>
      	<div class="row mt">
			<div class="col-md-12">

				<form class="form-horizontal" action="{{ route('area.store') }}" method="POST">{{ csrf_field() }}
		          <div class="box-body">
		            <div class="form-group">
		              <label for="area" class="col-sm-2 control-label"> Nome</label>

		              <div class="col-sm-6">
		                <input type="text" class="form-control" id="nome" name="nome" placeholder="Piscina" required>
		              </div>
		          	</div>

		          	<div class="form-group">
		              <label for="area" class="col-sm-2 control-label"> Breve Descrição</label>

		              <div class="col-sm-6">
		                <input type="text" class="form-control" id="breve_descricao" name="breve_descricao" placeholder="Descricao" required>
		              </div>
		          	</div>

		          	<div class="form-group">
		              <div class="col-sm-2">
		                <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
		              </div>
		            </div>		            
		          </div>	          		          
		        </form>

				<div class="content-panel">
				  <table class="table table-striped table-advance table-hover">
				  		<div class="col-md-8">
				  	  		<h4><i class="fa fa-angle-right"></i> Areas</h4>
				  		</div>					  		

					  	  <br>
				      <thead>
				          <tr>
				          	  <th width="10%"> Numero</th>
				              <th width="30%"> Area Comum</th>
				              <th width="40%"> Breve Descrição</th>
				              <th width="20%"> Ações</th>
				          </tr>
				      </thead>
				      <tbody>
				      	@if(count($areas) > 0)
				      		@php
				      		$i = 1;
				      		@endphp
				      		@foreach($areas as $area)
					          <tr>
					              <td>{{ $area->AREA_COMUM_ID }}</td>
					              <td>{{ $area->AREA_COMUM_NOME }}</td>
					              <td>{{ $area->AREA_COMUM_BREVE_DESCRICAO }}</td>
					              <td>
					                  <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-editar<?php echo $i;?>"><i class="fa fa-pencil"></i> Editar</a>

			                  			<div class="modal modal-default fade" id="modal-editar<?php echo $i;?>">
								          <div class="modal-dialog modal-lg">
								            <div class="modal-content">
								              <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                  <span aria-hidden="true">&times;</span></button>
								                <h4 class="modal-title">Editando a Area - <strong>{{ $area->AREA_COMUM_NOME }}</strong></h4>
								              </div>

								              <form class="form-horizontal" action="{{ route('area.update', $area->AREA_COMUM_ID) }}" method="post"><input name="_method" type="hidden" value="PUT">{{ csrf_field() }}
									              <div class="modal-body">

											        <div class="form-group">
										              <label for="area" class="col-sm-2 control-label"> Nome</label>

										              <div class="col-sm-6">
										                <input type="text" class="form-control" id="nome" name="nome" placeholder="Piscina" value="{{ $area->AREA_COMUM_NOME }}" required>
										              </div>
										          	</div>

										          	<div class="form-group">
										              <label for="area" class="col-sm-2 control-label"> Breve Descrição</label>

										              <div class="col-sm-6">
										                <input type="text" class="form-control" id="breve_descricao" name="breve_descricao" placeholder="Descricao" value="{{ $area->AREA_COMUM_BREVE_DESCRICAO }}" required>
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
										        <h4 class="modal-title">Solicitação de exclusão da Area <strong>{{ $area->AREA_COMUM_NOME }}</strong></h4>
										      </div>
										      <div class="modal-body">
										        <p>Tem certeza que deseja excluir esta Area?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <form method="POST" action="{{ route('area.destroy', $area->AREA_COMUM_ID) }}" accept-charset="UTF-8">
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
				        		<td colspan="5" align="center">Não existe Areas cadastradas</td>
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