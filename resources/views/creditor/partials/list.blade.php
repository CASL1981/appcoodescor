<tr data-id="{{ $element->id }}">
    <td>{{ $element->nit }}</td>
    <td>{{ $element->name }}</td>
    <td>{{ $element->formapago }}</td>
    <td>{{ $element->plazo }} Días</td>
    
    <td width="50px">
        <center>
            <a href="{{ route('creditor.edit', $element->id) }}"><button class="btn btn-primary btn-circle" type="button">
                <i class="fa fa-list"></i>    
            </button></a>                                                  
             
            <a href="#"><button class="btn btn-danger btn-circle btn-delete" type="button">E</button></a>
         </center>                    
    </td>
</tr>