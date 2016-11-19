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
					{!! Form::select('articulo_id', $article, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Un Articulo']) !!}
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
    
    

    <div class="row col-md-11">
	    <div class="table-responsive">
	      <table class="table table-borderless" id="table">
	        <tr>
	          <th>No.</th>
	          <th>Articulo</th>
	          <th>Existencia</th>
	          <th>Cantidad</th>
	          <th>Actiones</th>
	        </tr>
	        {{ csrf_field() }}

	        <?php $no=1; ?>
	        @foreach($orden as $order)
	          <tr class="item{{$order->id}}">
	            <td>{{$no++}}</td>
	            <td>{{$order->articulo_id}}</td>
	            <td>{{$order->existencia}}</td>
	            <td>{{$order->cantidad}}</td>
	            <td>
	            <button class="edit-modal btn btn-primary" data-id="{{$order->id}}" data-existencia="{{$order->existencia}}" data-cantidad="{{$order->cantidad}}">
	              <span class="glyphicon glyphicon-edit"></span> Edit
	            </button>
	            <button class="delete-modal btn btn-danger" data-id="{{$order->id}}" data-existencia="{{$order->existencia}}" data-cantidad="{{$order->cantidad}}">
	              <span class="glyphicon glyphicon-trash"></span> Delete
	            </button>
	          </td>
	          </tr>
	        @endforeach
	      </table>
	    </div>
	</div>


	<!-- Inicio formulario modal -->
	<div id="myModal" class="modal fade" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <h4 class="modal-title"></h4>
	        </div>
	        <div class="modal-body">
	          <form class="form-horizontal" role="form">
	            <div class="form-group">
	              <label class="control-label col-sm-2" for="id">Articulo :</label>
	              <div class="col-sm-10">
	                <input type="text" class="form-control" id="fid" disabled>
	              </div>
	            </div>
	            <div class="form-group">	              
	              <div class="col-sm-10">
	                <input type="text" class="hidden" id="requis" >
	              </div>
	            </div>
	              <div class="form-group">
	              <label class="control-label col-sm-2" for="title">Existencia:</label>
	              <div class="col-sm-10">
	                <input type="name" class="form-control center-block" id="exis">
	              </div>
	            </div>
	            <div class="form-group">
	            <label class="control-label col-sm-2" for="description">Cantidad:</label>
	            <div class="col-sm-10">
	              <input type="name" class="form-control center-block" id="cant">
	            </div>
	          </div>
	          </form>
	            <div class="deleteContent">
	            Estas seguro que quieres borrarlo <span class="title"></span> ?
	            <span class="hidden id"></span>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn actionBtn" data-dismiss="modal">
	              <span id="footer_action_button" class='glyphicon'> </span>
	            </button>
	            <button type="button" class="btn btn-warning" data-dismiss="modal">
	              <span class='glyphicon glyphicon-remove'></span> Close
	            </button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	<!-- Fin formulario modal -->
	
	
@endsection

@section('script')
    
    <script>
        
        $(document).ready(function(){

    		add("#add", "/order");  	

            
        });

        //ACTIVAMOS LA BENMTA MODAL PARA EDITAR
        $(document).on('click', '.edit-modal', function() {
		    $('#footer_action_button').text(" Actualizar");
		    $('#footer_action_button').addClass('glyphicon-check');
		    $('#footer_action_button').removeClass('glyphicon-trash');
		    $('.actionBtn').addClass('btn-success');
		    $('.actionBtn').removeClass('btn-danger');
		    $('.actionBtn').addClass('edit');
		    $('.modal-title').text('Editar Articulo Solicitado');
		    $('.deleteContent').hide();
		    $('.form-horizontal').show();
		    $('#fid').val($(this).data('id'));
		    $('#exis').val($(this).data('existencia'));
		    $('#cant').val($(this).data('cantidad'));
		    $('#myModal').modal('show');
		});

		//FUNCION PARA EDITAR EL REGISTRO DEL PEDIDO
		$('.modal-footer').on('click', '.edit', function() {
		  $.ajax({
		      type: 'PUT',
		      url: '/order/update',
		      data: {
		          '_token': $('input[name=_token]').val(),
		          'id': $("#fid").val(),		          
		          'existencia': $('#exis').val(),
		          'cantidad': $('#cant').val()
		      },
		      success: function(data) {
		          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.articulo_id + "</td><td>" + data.existencia + "</td><td>" + data.cantidad + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-existencia='" + data.existencia + "' data-cantidad='" + data.cantidad + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-existencia='" + data.existencia + "' data-cantidad='" + data.cantidad + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
		      }
		  });
		});


		//ACTIVAMOS LA VENTA MODAL PARA ELIMINAR
		$(document).on('click', '.delete-modal', function() {
		  $('#footer_action_button').text(" Eliminar");
		  $('#footer_action_button').removeClass('glyphicon-check');
		  $('#footer_action_button').addClass('glyphicon-trash');
		  $('.actionBtn').removeClass('btn-success');
		  $('.actionBtn').addClass('btn-danger');
		  $('.actionBtn').addClass('delete');
		  $('.modal-title').text('Eliminar Articulo Solicitado');
		  $('.id').text($(this).data('id'));
		  $('.deleteContent').show();
		  $('.form-horizontal').hide();
		  $('.title').html($(this).data('title'));
		  $('#myModal').modal('show');
		});


		//FUNCION PARA ELIMINAR EL REGISTRO DEL PEDIDO
		$('.modal-footer').on('click', '.delete', function() {
			console.log($('.id').text());
		  $.ajax({
		    type: 'DELETE',
		    url: '/order/destroy',
		    data: {
		      '_token': $('input[name=_token]').val(),
		      'id': $('.id').text()
		    },
		    success: function(data) {
		      $('.item' + $('.id').text()).remove();
		    }
		  });
		});

    </script>

@endsection