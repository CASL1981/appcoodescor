@extends('home')

@section('content')
<div class="container">
    <div class="row">
        <br>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Usuarios</div>

                @include('errors.error')
                
                <div class="panel-body sinpadding paddingbuttom">
                    <form class="form " role="form" method="POST" action="{{ url('mantenimiento/User') }}">
                        {{ csrf_field() }}

                        <div class="form-group col-md-4 ">
                            <label for="nick" class="col-md-5 control-label">Nick Usuario</label>

                            <div class="col-md-7 ">
                                <input id="nick" type="text" class="form-control input-sm" name="nick" value="{{ old('nick') }}">
                            </div>
                        </div>

                        <div class="form-group col-md-5 ">
                            <label for="name" class="col-md-2 control-label">Name</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control input-sm" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group col-md-3 ">
                            <label for="co" class="col-md-2 control-label">CO</label>

                            <div class="col-md-10">
                                <input id="co" type="text" class="form-control input-sm" name="co" value="{{ old('co') }}">
                            </div>
                        </div>                        
                        

                        <div class="form-group col-md-4" >
                            <div class="col-md-3" ">
                                <label for="area" class="form-label">Area</label>
                            </div>
                            <div class="col-md-9">
                                
                                {!! Form::select('area', ["sin area" => "Selecione Opción","Administracion" => "Administracion", "Comercial" => "Comercial", "Farmacias" => "Farmacias"], null, ['class' => 'form-control' ]) !!}  
                            </div>                                
                        </div>

                        <div class="form-group col-md-8 ">
                            <label for="email" class="col-md-2 control-label">E-Mail</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control input-sm" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- Tabla de Usuarios --}}
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Usuarios
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nick</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>CO</th>
                                <th>Area</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $element)
                                <tr data-id="{{ $element->id }}">
                                    <td>{{ $element->nick }}</td>
                                    <td>{{ $element->name }}</td>
                                    <td>{{ $element->email }}</td>
                                    <td>{{ $element->co }}</td>
                                    <td>{{ $element->area }}</td>
                                    
                                    <td style="display: inline-block">
                                        
                                        <a href="{{ route('mantenimiento.User.edit', $element->id) }}"><button class="btn btn-primary btn-circle" type="button">
                                            <i class="fa fa-list"></i>    
                                        </button></a>
                                                                   
                                         
                                        <a href="#"><button class="btn btn-danger btn-circle btn-delete" type="button">E</button></a>
                                                                    
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{ $user->render() }}
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>        
    </div>
    {!! Form::open(['route' => ['mantenimiento.User.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('script')
    
    <script>
        
        $(document).ready(function(){

            $('.btn-delete').click(function(){
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
            
        });

    </script>

@endsection
