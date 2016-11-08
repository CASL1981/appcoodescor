@extends('home')

@section('content')
	<br>
	<div class="col-md-11">
		<div class="panel panel-green">
	        <div class="panel-heading">
	            <div class="row">
	                <div class="col-xs-3">
	                    <i class="fa fa-tasks fa-5x"></i>
	                </div>
	                <div class="col-xs-9 text-right">
	                    <div class="huge">{{ $articles->count() }}</div>
	                    <div>Articulos</div>
	                </div>
	            </div>
	        </div>
	        
	        <div class="panel-footer">
				@include('errors.error')

	            {!! Form::open(['route' => 'article.store', 'method' => 'POST']) !!}
					
					@include('article.partials.from')

					<div class="col-md-12">
						{!! Form::label('Acreedor', 'Acreedor') !!}
						{!! Form::select('acreedor_id', $creditors, null, ['class' => 'form-control', 'col-md-9']) !!}
					</div>

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
	    
    

    <div class="col-md-11">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            Lista de Articulos
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>Nombre</th>
	                            <th>Unidad</th>
	                            <th>Marca</th>
	                            <th>Costo</th>
	                            <th>Tasa</th>
	                            <th>Operaciones</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach ($article as $element)
	                            @include('article.partials.list')
	                        @endforeach
	                        
	                    </tbody>	                    
	                </table>
	                {{ $article->render() }}
	            </div>
	            <!-- /.table-responsive -->
	        </div>
	        <!-- /.panel-body -->
	    </div>        
	</div>
	{!! Form::open(['route' => ['article.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('script')
    
    <script>
        
        $(document).ready(function(){

        	borrarRegistro('.btn-delete');            
            
        });

    </script>

@endsection