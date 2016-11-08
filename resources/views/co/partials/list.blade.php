<tr data-id="{{ $element->id }}">
    <td>{{ $element->codigo }}</td>
    <td>{{ $element->nombre }}</td>                                
    
    <td width="50px">
        <center>
            <a href="{{ route('mantenimiento.Co.edit', $element->id) }}"><button class="btn btn-primary btn-circle" type="button">
                <i class="fa fa-list"></i>    
            </button></a>                                                  
             
            <a href="#"><button class="btn btn-danger btn-circle btn-delete" type="button">E</button></a>
         </center>                    
    </td>
</tr>