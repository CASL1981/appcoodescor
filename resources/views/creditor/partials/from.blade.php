<div class="col-md-4">
	{!! Form::label('nit', 'NIT') !!}
	{!! Form::text('nit', null, ['class' => 'form-control', 'col-md-9']) !!}
</div>

<div class="col-md-8">
	{!! Form::label('name', 'Descripción') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'col-md-9']) !!}
</div>

<div class="col-md-8">
	{!! Form::label('formapago', 'Forma de Pago') !!}
	{!! Form::select('formapago', ['sin formapago' => 'Seleccione Forma de Pago', 'Contado' => 'Contado', 'Credito' => 'Credito', 'Anticipo' => 'Anticipo'],null, ['class' => 'form-control', 'col-md-9']) !!}
</div>

<div class="col-md-4">
	{!! Form::label('plazo', 'Numero de Días') !!}
	{!! Form::text('plazo', null, ['class' => 'form-control', 'col-md-2']) !!}
</div>