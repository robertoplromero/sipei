{{-- Importa plantilla --}}
@extends('layouts.app')
{{-- Importa JavaScript y CSS para DataTables. También incluye función inicial (id='table')  --}}
@include('imports.datatables')
{{-- Título de la página --}}
@section('title', 'Unidades')

@section('content')
  <br>
  <div class="row">
    <h1>Unidades</h1>  
  </div>
  <br>
  <div class="row">
    <a href="{{ route('unidades.create') }}" class="btn btn-primary col-2">Nueva unidad</a>
  </div>
  <br>
  @if( @isset($unidades) && $unidades!=null && count($unidades)>0 )
  <table class="table" id="table" style="width:100%">
    <thead>
      <th>ID</th>
      <th>Unidad</th>
      <th>Estado</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      @foreach($unidades as $unidad)      
        <tr @if(!$unidad->status) class="unidad-inactiva" @endif>
          <td>{{$unidad->id}}</td>
          <td>{{$unidad->unidad}}</td>
          <td>@if($unidad->status)Activo @else Inactivo @endif</td>
          <td>
            <a href="{{ route('unidades.show', array('unidade' => $unidad->id)) }}" class="btn btn-primary">Ver</a>
            <a href="{{ route('unidades.edit', array('unidade' => $unidad->id)) }}" class="btn btn-warning">Editar</a>
            @if($unidad->status)
              <form action="{{ route('unidades.destroy', $unidad->id) }}" method="POST" onSubmit="return validateDelete(this);">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Desactivar</button>
              </form>
            @else
              <form action="{{ route('unidades.restore', $unidad->id) }}" method="POST" onSubmit="return validateRestore(this);">
                @csrf
                <button type="submit" class="btn btn-success">Reactivar</button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @else
    <p><i>No hay información para mostrar.</i></p>
  @endif

@endsection

@push('stylesheets')
  {{-- <link rel="stylesheet" href="{{asset('css/SIPEI/usuarios.css')}}"> --}}
  <style>
    .unidad-inactiva td{
      color: red;
    }
  </style>
@endpush

@push('scripts')

  {{-- DataTable --}}
  <script type="text/javascript">
    $(document).ready( function () {      
      $('#table').DataTable({
        language: {url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json"},
        order: [[3, 'asc']],
        pageLength : 10, 
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'Todos'],
        ],   
        dom: 'Blfrtip',
        buttons: [{
          extend: 'excel',
          exportOptions: {
            columns: [0, 1, 2]
          }
        }],        
      });
    });
  </script>

  {{-- Si hay mensaje de notificación se muestra --}}
  @if( \Session::has('alert') )
    <script>
      $(function(){      
        swal('{{\Session::get('alert')['title'] }}', '{{\Session::get('alert')['subtitle'] }}', '{{\Session::get('alert')['icon'] }}');
      });
    </script>
  @endif

  <script>
    function validateDelete(form){
      event.preventDefault();
      swal({
        title: "Confirmar",
        text: "Estás seguro de Desactivar este registro?",
        icon: "warning",
        buttons: ["Cancelar", "Desactivar"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        } 
      });
    }
    function validateRestore(form){
      event.preventDefault();
      swal({
        title: "Reactivar",
        text: "Estás seguro de reactivar este registro?",
        icon: "warning",
        buttons: ["Cancelar", "Reactivar"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        } 
      });
    }
  </script>

@endpush