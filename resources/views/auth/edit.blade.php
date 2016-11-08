@extends('home')

@section('content')
<div class="container">
    <div class="row">
        </br>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Modificar Usuarios</div>
                <div class="panel-body ">

                    {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'put']) !!}
                        
                        <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            {{-- <label for="name" class="col-md-1 control-label">Nombre</label> --}}
                            {!! Form::label('name', 'Nombre', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">
                            {!! Form::text('name', $user->name, ['class' => 'form-control' ]) !!}
                                {{-- <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"> --}}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <hr>                            
                            <hr>
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                            {{-- <label for="email" class="col-md-2 control-label">E-Mail Address</label> --}}
                            {!! Form::label('email', 'E-Mail', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">
                            {!! Form::text('email', $user->email, ['class' => 'form-control' ]) !!}

                                {{-- <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"> --}}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group col-md-5{{ $errors->has('co') ? ' has-error' : '' }}">
                            
                            {!! Form::label('co', 'CO', ['class' => 'col-md-5 control-label']) !!}

                            <div class="col-md-6">
                            {!! Form::text('co', $user->co, ['class' => 'form-control' ]) !!}    

                                @if ($errors->has('co'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('co') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        
                        

                        <div class="form-group col-md-7 sinpadding {{ $errors->has('area') ? ' has-error' : '' }}">
                            
                            {!! Form::label('area', 'Area', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-9">
                            {!! Form::select('area', ["Administracion" => "Administracion", "Comercial" => "Comercial", "Farmacias" => "Farmacias"], $user->area, ['class' => 'form-control' ]) !!}    
                                
                                @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div>
                            <hr>
                            <hr>
                            <hr>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Modificar
                                </button>
                            </div>
                        </div>


                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
