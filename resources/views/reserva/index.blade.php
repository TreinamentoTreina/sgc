@extends('main')

@section('title', '| Reuniao')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">
		
		<br>
      	<ol class="breadcrumb">
			<li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Reserva</li>			
		</ol>
      	<div class="row mt">
			<div class="col-md-12">
			  <div class="content-panel">
			      <table class="table table-striped table-advance table-hover">
			      		<div class="col-md-8">
			  	  	  		<h4><i class="fa fa-angle-right"></i> Reserva</h4>
			  	  		</div>
			  	  		<div class="col-md-4">
							<a href="{{ route('reserva.create') }}" class="btn btn-primary pull-right"> Reservar Area</a>
						</div>

			  	  	  <br>
			          <thead>
				          <tr>
				              <th class="hidden-phone"> Area Comum</th>
				              <th> Data</th>
				              <th> Hora</th>
				              <th> Reservado por</th>
				              <th>Ações</th>
				          </tr>
			          </thead>
			          <tbody>
			          	@if($reservas && !empty($reservas))
			          	@php
			          	$i = 1;
			          	@endphp
			          		@foreach($reservas as $reserva)
					          <tr>
					              <td>{{ $reserva->areaComum->AREA_COMUM_NOME }}</td>
					              <td>{{ $reserva->inverteData($reserva->RESERVA_AREA_DATA_RESERVA) }}</td>
					              <td>{{ $reserva->RESERVA_AREA_HORARIO_INICIO }}</td>
					              <td>{{ $reserva->condomino->CONDOMINO_NOME }}</td>
					              <td>					              	
					              	  <a href="{{ route('reserva.show', $reserva->RESERVA_AREA_ID) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i> Ver</a>
					                  <a href="{{ route('reserva.edit', $reserva->RESERVA_AREA_ID) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>

					                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{ $i }}"><i class="fa fa-trash "></i> Apagar</button>
										<div id="myModal{{ $i }}" class="modal fade" role="dialog">
										  <div class="modal-dialog">

										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title">Solicitação de exclusão da reserva do dia  <strong>{{ $reserva->inverteData($reserva->RESERVA_AREA_DATA_RESERVA) }} às {{ $reserva->RESERVA_AREA_HORARIO_INICIO}}</strong></h4>
										      </div>
										      <div class="modal-body">
										        <p>Tem certeza que deseja excluir a Reserva?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
									            <form method="POST" action="{{ route('reserva.destroy', $reserva->RESERVA_AREA_ID) }}" accept-charset="UTF-8">
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
				        		<td colspan="5">Não existe Reservas cadastradas</td>
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