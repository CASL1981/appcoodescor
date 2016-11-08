@extends('home')
@section('content')

	<br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">                    
                    <h3>Solicitudes de Pedidos sin Aprobar</h3>
                </div>
            </div>
        </div>

        @if(count($stationery) > 1)
		
        	@foreach($stationery as $item)
	        	<a href="{{ route('stationery.show', $item->id) }}">
	            <div class="panel-footer">
	                <span class="pull-left">Su pedido Numero: {{ $item->id }} se encuentra en estado pendiente de aprobación, dando click en este link puede adiconar articulos o modificar los existentes</span>
	                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                <div class="clearfix"></div>
	            </div>
	            </a>
            @endforeach
        @else
        
			<div class="panel-footer">
	            <span class="pull-left">No existen Solicitudes de pedidos pendientes de aprobar</span>
                <hr>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::open(['route' => 'stationery.store', 'method' => 'POST', 'id' => 'form-save']) !!}
                            <button type="submit" class="btn btn-primary" id="crearSolicitud">
                                <i class="fa fa-btn fa-plus-square"></i> Crear Solicitud
                            </button>    
                        {!! Form::close() !!}                        
                    </div>
                </div>            
	            <div class="clearfix"></div>
	        </div>
	     
        @endif
        
    </div>
    
@endsection

@section('script')
    
    <script>
        // $('#crearSolicitud').click(function(e){
        //     e.preventDefault();
                
        //     var form = $('#form-save');
        //     var url = form.attr('action');
        //     var data = form.serialize();
               
        //     $.post(url, data, function(result){                
                
        //     });            
        // });
    </script>

@endsection