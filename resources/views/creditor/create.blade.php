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
	                <div class="col-xs-9 text-right">
	                    <div class="huge">{{ $creditors->count() }}</div>
	                    <div>Acreedores</div>
	                </div>
	            </div>
	        </div>
	        
                                
                            
	        <div class="panel-footer">
				@include('errors.error')

	            {!! Form::open(['route' => 'creditor.store', 'method' => 'POST']) !!}
					
					@include('creditor.partials.from')  

					<div class="col-md-2 col-md-offset-4" style="margin-top:15px">
					    <button type="submit" class="btn btn-success">
					        <i class="fa fa-btn fa-save"></i> Guardar
					    </button>
					</div>                  

	            {!! Form::close() !!}
                
                <div class="clearfix"></div>
	        </div>
	        
	    </div>
	</div>
	    
    

    <div class="col-md-10 col-md-offset-1">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            Lista de Acreedores
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>NIT</th>
	                            <th>Descripcion</th>
	                            <th>Forma de Pago</th>
	                            <th>Plazo</th>
	                            <th>Operaciones</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach ($creditor as $element)
	                            @include('creditor.partials.list')
	                        @endforeach
	                        
	                    </tbody>	                    
	                </table>
	                {{ $creditor->render() }}
	            </div>
	            <!-- /.table-responsive -->
	        </div>
	        <!-- /.panel-body -->
	    </div>        
	</div>
	{!! Form::open(['route' => ['creditor.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('script')
    
    <script>
        
        $(document).ready(function(){

        	borrarRegistro('.btn-delete');            
            
        });

    </script>

@endsection