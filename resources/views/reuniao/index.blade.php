@extends('main')

@section('title', '| Reuniao')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">
		
		<br>
      	<ol class="breadcrumb">
			<li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Reunião</li>			
		</ol>
      	<div class="row mt">
			<div class="col-md-12">
			  <div class="content-panel">
			      <table class="table table-striped table-advance table-hover">
			      		<div class="col-md-8">
			  	  	  		<h4><i class="fa fa-angle-right"></i> Reuniões</h4>
			  	  		</div>
			  	  		<div class="col-md-4">
							<a href="{{ route('reuniao.create') }}" class="btn btn-primary pull-right">Agendar Nova</a>
						</div>

			  	  	  <br>
			          <thead>
				          <tr>
				              <th class="hidden-phone"> Assunto</th>
				              <th> Data</th>
				              <th> Hora</th>
				              <th> Situação</th>
				              <th>Ações</th>
				          </tr>
			          </thead>
			          <tbody>
			          	@if($reunioes)
			          	@php
			          	$i = 1;
			          	@endphp
			          		@foreach($reunioes as $reuniao)
					          <tr>
					              <td class="hidden-phone">{{ $reuniao->assunto->ASSUNTO_DESCRICAO }}</td>
					              <td>{{ $reuniao->inverteData($reuniao->REUNIAO_DATA) }}</td>
					              <td>{{ $reuniao->REUNIAO_HORA }}</td>
					              <td>{{ $reuniao->status->STATUSR_DESCRICAO }}</td>
					              <td>
					              	@if($reuniao->status->STATUSR_ID == 2)
					              	  <a href="{{ route('reuniao.show', $reuniao->REUNIAO_ID) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i> Ver</a>
					              	@elseif($reuniao->status->STATUSR_ID == 1)
					              	  <a href="{{ route('reuniao.show', $reuniao->REUNIAO_ID) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i> Ver</a>
					                  <a href="{{ route('reuniao.edit', $reuniao->REUNIAO_ID) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>

					                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{ $i }}"><i class="fa fa-trash "></i> Apagar</button>
										<div id="myModal{{ $i }}" class="modal fade" role="dialog">
										  <div class="modal-dialog">

										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Solicitação de exclusão da reunião do dia  <strong>{{ $reuniao->inverteData($reuniao->REUNIAO_DATA) }} às {{ $reuniao->REUNIAO_HORA}}</strong></h4>
										      </div>
										      <div class="modal-body">
										        <p>Tem certeza que deseja excluir a Reunião?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <form method="POST" action="{{ route('reuniao.destroy', $reuniao->REUNIAO_ID) }}" accept-charset="UTF-8">
									            	<input name="_method" type="hidden" value="DELETE">
									            	{{ csrf_field() }}
									            	<input class="btn btn-danger pull-right" type="submit" value="Excluir">
									            </form>
										      </div>
										    </div>

										  </div>
										</div>

									  <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#gerarAta{{ $i }}"><i class="fa fa-play "></i> Gerar ATA</button>
										<div id="gerarAta{{ $i }}" class="modal fade" role="dialog">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Gerar ATA da reunião <strong>{{ $reuniao->assunto->ASSUNTO_DESCRICAO }} do dia {{ $reuniao->inverteData($reuniao->REUNIAO_DATA) }} às {{ $reuniao->REUNIAO_HORA}}</strong></h4>
										      </div>
										      
									        <form class="form-horizontal" action="{{ route('reuniao.gerarAta', $reuniao->REUNIAO_ID) }}" method="POST"><input name="_method" type="hidden" value="PUT">{{ csrf_field() }}
										          <div class="modal-body">

										            <div class="form-group">
										              <label for="Ata" class="col-sm-2 control-label">Ata</label>

										              <div class="col-sm-10">
										                    <textarea class="form-control" name="ata" id="ata" style="resize: none;" required></textarea>
										                  </div>     
										            </div>
										          </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
										      </div>
										    </form>
										    </div>

										  </div>
										</div>
									@elseif($reuniao->status->STATUSR_ID == 3)
									   <a href="{{ route('reuniao.show', $reuniao->REUNIAO_ID) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i> Ver</a>

									   <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{ $i }}"><i class="fa fa-trash "></i> Apagar</button>
										<div id="myModal{{ $i }}" class="modal fade" role="dialog">
										  <div class="modal-dialog">

										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Solicitação de exclusão da reunião do dia  <strong>{{ $reuniao->inverteData($reuniao->REUNIAO_DATA) }} às {{ $reuniao->REUNIAO_HORA}}</strong></h4>
										      </div>
										      <div class="modal-body">
										        <p>Tem certeza que deseja excluir a Reunião?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <form method="POST" action="{{ route('reuniao.destroy', $reuniao->REUNIAO_ID) }}" accept-charset="UTF-8">
									            	<input name="_method" type="hidden" value="DELETE">
									            	{{ csrf_field() }}
									            	<input class="btn btn-danger pull-right" type="submit" value="Excluir">
									            </form>
										      </div>
										    </div>

										  </div>
										</div>

									   <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgendar{{ $i }}"><i class="fa fa-play "></i> Agendar</button>
										<div id="modalAgendar{{ $i }}" class="modal fade" role="dialog">
										  <div class="modal-dialog">

										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Solicitação de agendamento da reunião do dia  <strong>{{ $reuniao->inverteData($reuniao->REUNIAO_DATA) }} às {{ $reuniao->REUNIAO_HORA}}</strong></h4>
										      </div>
										      <div class="modal-body">
										        <p>Tem certeza que deseja agendar essa Reunião?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <form method="POST" action="{{ route('reuniao.agendar', $reuniao->REUNIAO_ID) }}" accept-charset="UTF-8">
									            	<input name="_method" type="hidden" value="PUT">
									            	{{ csrf_field() }}
									            	<input class="btn btn-success pull-right" type="submit" value="Agendar">
									            </form>
										      </div>
										    </div>

										  </div>
										</div>

									@endif
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