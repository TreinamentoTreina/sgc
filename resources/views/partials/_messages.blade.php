@if (Session::has('success'))
	
	<script type="text/javascript">
		$( document ).ready(function() {
			alertify.notify('{{ Session::get('success') }}', 'success', 5, function(){  });
		});
	</script>
	
@endif

@if (Session::has('error'))
	
	<script type="text/javascript">
		$( document ).ready(function() {
			alertify.notify('{{ Session::get('error') }}', 'error', 5, function(){  });
		});
	</script>
	
@endif

@if(count($errors) > 0)

	<script type="text/javascript">
		$( document ).ready(function() {
			@foreach($errors->all() as $error)
			alertify.notify('{{ $error }}', 'error', 5, function(){  });
			@endforeach
		});
	</script>

@endif