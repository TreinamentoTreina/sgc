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
							<a href="{{ route('reuniaoC.create') }}" class="btn btn-primary pull-right">Solicitar Reunião</a>
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
					              	
					              	  <a href="{{ route('reuniaoC.show', $reuniao->REUNIAO_ID) }}" class="btn btn-default btn-xs"><i class="fa fa-search"></i> Ver</a>
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