@extends('main')

@section('title', '| Dashboard')

@section('stylesheets')

@endsection

@section('content')

	<section class="wrapper site-min-height">		
		<br>
      	<ol class="breadcrumb">
			<li class="active"><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>				
		</ol>      		
	</section>
@endsection

@section('scripts')

@endsection