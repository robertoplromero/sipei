@extends('layouts.app')
@section('title', 'Históricos')
@section('content')
    <br>
    <div class="row">
        <h1>Históricos - @if($tipo==1)Registrar @elseif($tipo==2) Actualizar @else Ver @endif</h1>  
    </div>
    <br>
    <div class="row">
        <a href="{{ route('historicos.index') }}" class="btn btn-secondary col-2">Atrás</a>    
    </div>
    <br>
    <div class="row">
        @if($tipo==1)
            <form action="{{ route('historicos.store') }}" method="POST">
        @elseif($tipo==2)
            <form action="{{ route('historicos.update', array('historico' => $corte->id)) }}" method="POST">
            @method('PUT')
        @else
            <form>
        @endif
            {{-- CSRF --}}
            @csrf


            <label for="fecha_corte" class="form-label">Fecha de corte</label>
            <div class="input-group mb-3">
                <input type="date" class="form-control" id="fecha_corte" name="fecha_corte" value="@if($tipo!=1 && @isset($corte)){{$corte->fecha_corte}}@else{{old('fecha_corte')}}@endif" aria-describedby="fecha_corte" required @if($tipo==3)disabled @endif>
            </div>
            @if($errors->has('fecha_corte'))
                <div class="error">{{ $errors->first('fecha_corte') }}</div>
            @endif

            <label for="detalle" class="form-label">Detalle</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="detalle" name="detalle" value="@if($tipo!=1 && @isset($corte)){{$corte->detalle}}@else{{old('detalle')}}@endif" aria-describedby="detalle" @if($tipo==3)disabled @endif>
            </div>
            @if($errors->has('detalle'))
                <div class="error">{{ $errors->first('detalle') }}</div>
            @endif


            {{-- Se omite en consulta ($tipo==3) --}}
            @if($tipo!=3)
                <button type="submit" class="btn btn-primary col-2">@if($tipo==1)Registrar @else Actualizar @endif</button>
            @endif

        </form>
    </div>
    <br>
@endsection