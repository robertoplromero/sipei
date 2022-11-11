@extends('layouts.app')
@section('title', 'Inicio')
@section('content')

    <br>
    <div class="row">
        <h1>Inicio de sesión</h1>  
    </div>
    <br>
    <div class="row">
        <a href="{{ url('/') }}" class="btn btn-secondary col-2">Atrás</a>    
    </div>
    <br>
    <div class="row">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="username" class="form-label">Usuario</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" aria-describedby="username" required>
            </div>
            @if($errors->has('username'))
                <div class="error">{{ $errors->first('username') }}</div>
            @endif

            <label for="password" class="form-label">Contraseña</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" aria-describedby="password" required>
            </div>
            @if($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif          

            <button type="submit" class="btn btn-primary col-2">Iniciar sesión</button>           

        </form>
    </div>
    <br>
@endsection

@push('scripts')
    {{-- Si hay mensaje de notificación se muestra --}}
    @if( \Session::has('alert') )
    <script>
    $(function(){      
        swal('{{\Session::get('alert')['title'] }}', '{{\Session::get('alert')['subtitle'] }}', '{{\Session::get('alert')['icon'] }}');
    });
    </script>
    @endif
@endpush