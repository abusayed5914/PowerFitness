@if(Session::has('success'))
	<div class="alert alert-success" style="margin-top: 40px;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('success') }}
	</div>
@endif
@if(Session::has('danger'))
	<div class="alert alert-danger" style="margin-top: 40px;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('danger') }}
	</div>
@endif
@if(count($errors))
	<div class="alert alert-danger validation-error-message" style="margin-top: 40px;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Error:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>
					{{ $error }}
				</li>
			@endforeach
		</ul>	
	</div>
@endif