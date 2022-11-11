@extends('layouts.app')
@section('title', 'Unidades')
@section('content')
    <br>
    <div class="row">
        <h1>Unidades - @if($tipo==1)Registrar @elseif($tipo==2) Actualizar @else Ver @endif</h1>  
    </div>
    <br>
    <div class="row">
        <a href="{{ route('unidades.index') }}" class="btn btn-secondary col-2">Atrás</a>    
    </div>
    <br>
    <div class="row">
        @if($tipo==1)
            <form action="{{ route('unidades.store') }}" method="POST">
        @elseif($tipo==2)
            <form action="{{ route('unidades.update', array('unidade' => $unidad->id)) }}" method="POST">
            @method('PUT')
        @else
            <form>
        @endif
            {{-- CSRF --}}
            @csrf

            <label for="unidad" class="form-label">Unidad</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="unidad" name="unidad" value="@if($tipo!=1 && @isset($unidad)){{$unidad->unidad}}@else{{old('unidad')}}@endif" aria-describedby="unidad" required @if($tipo==3)disabled @endif>            
            </div>
                @if($errors->has('unidad'))
                    <div class="error">{{ $errors->first('unidad') }}</div>
                @endif


            {{-- Se omite en consulta ($tipo==3) --}}
            @if($tipo!=3)
                <button type="submit" class="btn btn-primary col-2">@if($tipo==1)Registrar @else Actualizar @endif</button>
            @endif

        </form>
    </div>
    <br>
@endsection