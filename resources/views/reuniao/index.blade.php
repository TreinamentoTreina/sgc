@extends('main')

@section('title', '| Reuniao | Index')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">
		
		<br>
      	<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
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
			          		@foreach($reunioes as $reuniao)
					          <tr>
					              <td class="hidden-phone">{{ $reuniao->REUNIAO_ASSUNTO }}</td>
					              <td>{{ $reuniao->inverteData($reuniao->REUNIAO_DATA) }}</td>
					              <td>{{ $reuniao->REUNIAO_HORA }}</td>
					              <td>
					              	@php
					              		if($reuniao->REUNIAO_STATUS == 1)
					              		{
					              			echo "Agendada";
					              		} else {
					              			echo "Realizada";
					              		}
					              	@endphp					              	
					              </td>					              
					              <td>
					              	  <a href="{{ route('reuniao.show', $reuniao->REUNIAO_ID) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i></a>
					                  <a href="{{ route('reuniao.edit', $reuniao->REUNIAO_ID) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>

					                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o "></i></button>
										<div id="myModal" class="modal fade" role="dialog">
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

@section('scripts')

@endsection