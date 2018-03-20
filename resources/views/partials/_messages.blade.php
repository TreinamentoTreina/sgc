@if (Session::has('success'))
	
	<script type="text/javascript">
		$( document ).ready(function() {
			alertify.notify('{{ Session::get('success') }}', 'success', 5, function(){  });
		});
	</script>
	
@endif

@if(count($errors) > 0)

	<script type="text/javascript">
		$( document ).ready(function() {
			@foreach($errors->all() as $error)
			alertify.notify('{{ $error }}', 'errorr', 5, function(){  });
			@endforeach
		});
	</script>

@endif