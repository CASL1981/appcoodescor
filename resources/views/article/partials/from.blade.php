<div class="col-md-8">
	{!! Form::label('name', 'Descripción') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'col-md-9']) !!}
</div>

<div class="col-md-4">
	{!! Form::label('unidad', 'Unidad') !!}
	{!! Form::text('unidad', null, ['class' => 'form-control', 'col-md-9']) !!}
</div>

<div class="col-md-4">
	{!! Form::label('marca', 'Marca') !!}
	{!! Form::text('marca', null, ['class' => 'form-control', 'col-md-9']) !!}
</div>

<div class="col-md-5">
	{!! Form::label('costo', 'Costo') !!}
	{!! Form::text('costo', null, ['class' => 'form-control', 'col-md-2']) !!}
</div>

<div class="col-md-3">
	{!! Form::label('Tasa', 'Tasa') !!}
	{!! Form::select('tasa', ['0' => 'Seleccione Tasa', '0' => '0%', '5' => '5%', '16' => '16%'],null, ['class' => 'form-control', 'col-md-9']) !!}
</div>

