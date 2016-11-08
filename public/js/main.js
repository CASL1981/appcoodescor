function borrarRegistro(clase){
	$(clase).click(function(){
        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize();

        
        $.post(url, data, function(result){
            row.fadeOut();
            alert(result.mensaje);
        });
    });
}


// add function
function add(objeto, ruta){
    $(objeto).click(function() {
      $.ajax({
        type: 'post',
        url: ruta,
        data: {
          '_token': $('input[name=_token]').val(),
          'articulo_id': $('select[name=articulo_id]').val(),
          'existencia': $('input[name=existencia]').val(),
          'cantidad': $('input[name=cantidad]').val(),
          'papeleria_id': $('input[name=papeleria_id]').val()
        },
        success: function(data) {
          if ((data.errors)) {
            $('.error').removeClass('hidden');
            $.each(data.errors, function(ind, elemt){
                $('.error').append(elemt + '<br>');
            });
          } else {
            $('.error').remove();
            $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.description + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
          }
        },
      });
      $('#existencia').val('');
      $('#cantidad').val('');
    });
}
