@extends('main')

@section('title', '| Todas Reuniões')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('reuniao.create') }}" class="btn btn-block btn-primary">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>		
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>

					
					
				</tbody>				
			</table>

			<div class="text-center">
				
			</div>
		</div>
	</div>

@stop