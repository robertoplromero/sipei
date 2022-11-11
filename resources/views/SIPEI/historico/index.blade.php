{{-- Importa plantilla --}}
@extends('layouts.app')
{{-- Importa JavaScript y CSS para DataTables. También incluye función inicial (id='table')  --}}
@include('imports.datatables')
{{-- Título de la página --}}
@section('title', 'Históricos')

@section('content')
  <br>
  <div class="row">
    <h1>Históricos</h1>  
  </div>
  <br>
  <div class="row">
    <a href="{{ route('historicos.create') }}" class="btn btn-primary col-2">Nueva fecha de corte</a>
  </div>
  <br>
  @if( @isset($cortes) && $cortes!=null && count($cortes)>0 )
  <table class="table" id="table" style="width:100%">
    <thead>
      <th>ID</th>
      <th>Fecha de corte</th>
      <th>Detalle</th>
      <th>Estado</th>
      <th>Opciones</th>
    </thead>
    <tbody>
      @foreach($cortes as $corte)      
        <tr @if(!$corte->status) class="registro-inactivo" @endif>
          <td>{{$corte->id}}</td>
          <td>{{$corte->fecha_corte}}</td>
          <td>{{$corte->detalle}}</td>
          <td>@if($corte->status)Activo @else Inactivo @endif</td>
          <td>
            <a href="{{ route('historicos.show', array('historico' => $corte->id)) }}" class="btn btn-primary">Ver</a>
            <a href="{{ route('historicos.edit', array('historico' => $corte->id)) }}" class="btn btn-warning">Editar</a>
            @if($corte->status)
              <form action="{{ route('historicos.destroy', $corte->id) }}" method="POST" onSubmit="return validateDelete(this);">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Desactivar</button>
              </form>
            @else
              <form action="{{ route('historicos.restore', $corte->id) }}" method="POST" onSubmit="return validateRestore(this);">
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
    .registro-inactivo td{
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