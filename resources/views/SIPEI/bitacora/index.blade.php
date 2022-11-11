{{-- Importa plantilla --}}
@extends('layouts.app')
{{-- Importa JavaScript y CSS para DataTables. También incluye función inicial (id='table')  --}}
@include('imports.datatables')
{{-- Título de la página --}}
@section('title', 'Bitácora')

@section('content')
  <br>
  <div class="row">
    <h1>Bitácora</h1>  
  </div>
  <br>
  @if( @isset($bitacora) && $bitacora!=null && count($bitacora)>0 )
  <table class="table" id="table" style="width:100%">
    <thead>
      <th>ID</th>
      <th>Fecha</th>
      <th>Usuario</th>
      <th>Acción</th>
      <th>Detalles</th>
    </thead>
    <tbody>
      @foreach($bitacora as $registro)
        <tr>
          <td>{{$registro->bitacora_id}}</td>
          <td>{{$registro->date}}</td>
          <td>{{$registro->username}}</td>
          <td>{{$registro->accion}}</td>
          <td>{{$registro->details}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @else
    <p><i>No hay información para mostrar.</i></p>
  @endif

@endsection

@push('scripts')

  {{-- DataTable --}}
  <script type="text/javascript">
    $(document).ready( function () {      
      $('#table').DataTable({
        language: {url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json"},
        order: [[0, 'desc']], 
        pageLength : 10, 
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'Todos'],
        ],       
        dom: 'Blfrtip',
        buttons: [{
          extend: 'excel',
          exportOptions: {
            columns: [0, 1, 2, 3, 4]
          }
        }],        
      });
    });
  </script>

@endpush