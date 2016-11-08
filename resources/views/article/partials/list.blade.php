<tr data-id="{{ $element->id }}">
    <td>{{ $element->name }}</td>
    <td>{{ $element->unidad }}</td>
    <td>{{ $element->marca }}</td>
    <td>{{ $element->costo }}</td>
    <td>{{ $element->tasa }}%</td>
    
    <td width="50px">
        <center>
            <a href="{{ route('article.edit', $element->id) }}"><button class="btn btn-primary btn-circle" type="button">
                <i class="fa fa-list"></i>    
            </button></a>                                                  
             
            <a href="#"><button class="btn btn-danger btn-circle btn-delete" type="button">E</button></a>
         </center>                    
    </td>
</tr>