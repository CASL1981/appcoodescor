@extends('home')

@section('content')
	<br>
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-green">
	        <div class="panel-heading">
	            <div class="row">
	                <div class="col-xs-3">
	                    <i class="fa fa-tasks fa-5x"></i>
	                </div>
	                <div class="col-md-9">	                    
	                    <h2>Editando Centro de Operación {{ $Co->codigo }}</h1>
	                </div>
	            </div>
	        </div>
	        
                                
                            
	        <div class="panel-footer">
				@include('errors.error')

	            {!! Form::model($Co, ['route' => ['mantenimiento.Co.update', $Co], 'method' => 'PUT']) !!}

					@include('co.partials.from') 	

					<div class="col-md-2 col-md-offset-4" style="margin-top:15px">
					    <button type="submit" class="btn btn-success">
					        <i class="fa fa-btn fa-save"></i> Modificar
					    </button>
					</div>                    

	            {!! Form::close() !!}
                
                <div class="clearfix"></div>
	        </div>
	        
	    </div>
	</div>
@endsection