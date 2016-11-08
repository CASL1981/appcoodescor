@if ($errors->any())
	
	<div class="alert alert-danger">
		<p>Por Favor Corrige Los Errores</p>

		@foreach ($errors->all() as $error)
			<ul>
				<li>
					{{ $error }}			
				</li>
			</ul>	
		@endforeach
	</div>
@endif