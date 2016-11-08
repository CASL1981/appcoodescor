@extends('home')

@section('content')
	<br>
	<div class="col-md-11">
		
		<div class="form-group row add">	
			<div class="form-group row add">
				<p class="error alert alert-danger hidden"></p>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				 <div class="col-md-5">
					{!! Form::label('Articulo', 'Articulo') !!}
					{!! Form::select('articulo_id', $article, null, ['class' => 'form-control']) !!}
				</div>   

			    <div class="col-md-2">
			    	{!! Form::label('Existencia', 'Existencia') !!}
			    	{!! Form::text('existencia', null, ['class' => 'form-control', 'id' => 'existencia']) !!}
			    </div>

			    <div class="col-md-2">
			    	{!! Form::label('Cantidad', 'Cantidad') !!}
			    	{!! Form::text('cantidad', null, ['class' => 'form-control', 'id' => 'cantidad']) !!}
			    </div>
			    <div class="col-md-2">
			    	{!! Form::text('papeleria_id', $requisicion, ['class' => 'hidden']) !!}
			    </div>


			    <div class="col-md-2">
			    <br>
			      <button class="btn btn-warning" type="submit" id="add">
			        <span class="glyphicon glyphicon-plus"></span> Add Articulo
			      </button>
			    </div>
			</div>
		
		</div>
	    
	</div>
	    
    <!-- quede por aqui, tengo que desarrollar el codigo de la tabla y la consultas las base de datos -->
    
    

    <div class="row">
	    <div class="table-responsive">
	      <table class="table table-borderless" id="table">
	        <tr>
	          <th>No.</th>
	          <th>Title</th>
	          <th>Description</th>
	          <th>Actions</th>
	        </tr>
	        {{ csrf_field() }}

	        <?php $no=1; ?>
	        @foreach($blogs as $blog)
	          <tr class="item{{$blog->id}}">
	            <td>{{$no++}}</td>
	            <td>{{$blog->title}}</td>
	            <td>{{$blog->description}}</td>
	            <td>
	            <button class="edit-modal btn btn-primary" data-id="{{$blog->id}}" data-title="{{$blog->title}}" data-description="{{$blog->description}}">
	              <span class="glyphicon glyphicon-edit"></span> Edit
	            </button>
	            <button class="delete-modal btn btn-danger" data-id="{{$blog->id}}" data-title="{{$blog->title}}" data-description="{{$blog->description}}">
	              <span class="glyphicon glyphicon-trash"></span> Delete
	            </button>
	          </td>
	          </tr>
	        @endforeach
	      </table>
	    </div>
	  </div>
	
@endsection

@section('script')
    
    <script>
        
        $(document).ready(function(){

    		add("#add", "/order");  	

            
        });

    </script>

@endsection