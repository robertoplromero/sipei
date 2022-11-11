@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
    <br>
    <div class="row">
        <h1>Usuarios - @if($tipo==1)Registrar @elseif($tipo==2) Actualizar @else Ver @endif</h1>  
    </div>
    <br>
    <div class="row">
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary col-2">Atrás</a>    
    </div>
    <br>
    <div class="row">
        @if($tipo==1)
            <form action="{{ route('usuarios.store') }}" method="POST">
        @elseif($tipo==2)
            <form action="{{ route('usuarios.update', array('usuario' => $usuario->id)) }}" method="POST">
            @method('PUT')
        @else
            <form>
        @endif
            {{-- CSRF --}}
            @csrf

            <label for="nombre" class="form-label">Nombre</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" value="@if($tipo!=1 && @isset($usuario)){{$usuario->nombre}}@else{{old('nombre')}}@endif" aria-describedby="nombre" required @if($tipo==3)disabled @endif>            
            </div>
                @if($errors->has('nombre'))
                    <div class="error">{{ $errors->first('nombre') }}</div>
                @endif

            <label for="apellido_paterno" class="form-label">Apellido paterno</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="@if($tipo!=1 && @isset($usuario)){{$usuario->apellido_paterno}}@else{{old('apellido_paterno')}}@endif" aria-describedby="apellido_paterno" required @if($tipo==3)disabled @endif>
            </div>
                @if($errors->has('apellido_paterno'))
                    <div class="error">{{ $errors->first('apellido_paterno') }}</div>
                @endif

            <label for="apellido_materno" class="form-label">Apellido materno</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="@if($tipo!=1 && @isset($usuario)){{$usuario->apellido_materno}}@else{{old('apellido_materno')}}@endif" aria-describedby="apellido_materno" @if($tipo==3)disabled @endif>
            </div>
                @if($errors->has('apellido_materno'))
                    <div class="error">{{ $errors->first('apellido_materno') }}</div>
                @endif
            
            <label for="sexo" class="form-label">Sexo</label>
            <div class="input-group mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="sexo_h" value="h" required @if($tipo!=1 && @isset($usuario) && $usuario->sexo=='h') checked @endif @if($tipo==3)disabled @endif>
                    <label class="form-check-label" for="sexo_h">Hombre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="sexo_m" value="m" @if($tipo!=1 && @isset($usuario) && $usuario->sexo=='m') checked @endif @if($tipo==3)disabled @endif>
                    <label class="form-check-label" for="sexo_m">Mujer</label>
                </div>
            </div>
                @if($errors->has('sexo'))
                    <div class="error">{{ $errors->first('sexo') }}</div>
                @endif

            <label for="grado_academico" class="form-label">Grado Académico</label>
            <div class="input-group mb-3">
            <select class="form-select" aria-label="grado_academico" id="grado_academico" name="grado_academico" @if($tipo==3)disabled @endif>
                <option disabled>Selecciona una opción</option>
                @if(@isset($grados_academicos))
                    @foreach($grados_academicos as $grado_academico)
                        <option value="{{$grado_academico->id}}" @if($tipo>1 && $usuario->grado_academico_id==$grado_academico->id) selected @endif>{{$grado_academico->grado_academico}}</option>
                    @endforeach
                @endif
            </select>
            </div>
                @if($errors->has('grado_academico'))
                    <div class="error">{{ $errors->first('grado_academico') }}</div>
                @endif

            <label for="unidad" class="form-label">Unidad académica o administrativa</label>
            <div class="input-group mb-3">
            <select class="form-select" name="unidad" id="unidad" aria-label="unidad" @if($tipo==3)disabled @endif>
                <option disabled>Selecciona una opción</option>
                @if(@isset($unidades))
                @foreach($unidades as $unidad)
                    <option value="{{$unidad->id}}" @if($tipo>1 && $usuario->unidad_id==$unidad->id) selected @endif>{{$unidad->unidad}}</option>
                @endforeach
            @endif
            </select>
            </div>
            @if($errors->has('unidad'))
                <div class="error">{{ $errors->first('unidad') }}</div>
            @endif

            <label for="detalle" class="form-label">Detalle</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="detalle" name="detalle" value="@if($tipo!=1 && @isset($usuario)){{$usuario->detalle}}@else{{old('detalle')}}@endif" aria-describedby="detalle" required @if($tipo==3)disabled @endif>
            </div>
                @if($errors->has('detalle'))
                    <div class="error">{{ $errors->first('detalle') }}</div>
                @endif

            <label for="email" class="form-label">Correo electrónico</label>
            <div class="input-group mb-3">
                <input type="email" class="form-control" id="email" name="email" value="@if($tipo!=1 && @isset($usuario)){{$usuario->email}}@else{{old('email')}}@endif" aria-describedby="email" @if($tipo==3)disabled @endif>
            </div>
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif

            <label for="username" class="form-label">Usuario</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="username" name="username" value="@if($tipo!=1 && @isset($usuario)){{$usuario->username}}@else{{old('username')}}@endif" aria-describedby="username" required @if($tipo==3)disabled @endif>
            </div>
            @if($errors->has('username'))
                <div class="error">{{ $errors->first('username') }}</div>
            @endif

            {{-- Se omite en consulta ($tipo==3) --}}
            @if($tipo!=3)
                @if($tipo==2)<p><i>Dejar estos campos vacíos para mantener la misma contraseña</i></p>@endif
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" aria-describedby="password" @if($tipo==1)required @endif>
                </div>
                @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif

                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" aria-describedby="password_confirmation" @if($tipo==1)required @endif>
                </div>
                @if($errors->has('password_confirmation'))
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                @endif

                <button type="submit" class="btn btn-primary col-2">@if($tipo==1)Registrar @else Actualizar @endif</button>
            @endif

        </form>
    </div>
    <br>
@endsection