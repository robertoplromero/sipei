<?php

namespace App\Http\Controllers\SIPEI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SIPEI\Unidad;
use Carbon\Carbon;

// Bitácora
use App\Models\SIPEI\Bitacora;
// Usuario
use Illuminate\Support\Facades\Auth;

class UnidadController extends Controller{

    public function index(Request $request){
        $unidades = Unidad::select('id', 'unidad', 'status')->get();
        return view('SIPEI.unidades.index', compact('unidades'));
      }

      public function create(){      
        return view('SIPEI.unidades.create', array('tipo' => 1));
      }
    
      public function store(Request $request){
        $request->validate([          
          'unidad' => ['required', 'string', 'max:255', 'unique:sipei_unidades'],
        ]);      
        $unidad = Unidad::create([
          'unidad' => $request->unidad,
          
        ]);
    
        $alert = array('title' => '', 'text' => '', 'icon' => '');
        if($unidad->id!=null){
          // Bitácora
          $bitacora = new Bitacora();
          $bitacora->date=Carbon::now();
          $bitacora->usuario_id = Auth::user()->id;
          $bitacora->accion_id = 1; // Store (Guardado)
          $bitacora->details = 'sipei_unidades (ID:'.$unidad->id.')';
          $bitacora->device = $request->header('User_Agent');
          $bitacora->ip_address = $request->ip();
          $bitacora->save();

          

          $alert['title'] = 'Unidad registrada';
          $alert['subtitle'] = 'La unidad ha sido registrada exitosamente';
          $alert['icon'] = 'success';
        }else{
          $alert['title'] = 'Error';
          $alert['subtitle'] = 'Ocurrió un error inesperado. No se aplicados los cambios';
          $alert['icon'] = 'error';
        }
        return redirect()->route('unidades.index')->with(array('alert' => $alert));
      }
    
      public function show(Request $request, $unidade){

        $unidad = Unidad::find($unidade);
        if(collect($unidad)->isNotEmpty()){
          // Bitácora
          $bitacora = new Bitacora();
          $bitacora->date=Carbon::now();
          $bitacora->usuario_id = Auth::user()->id;
          $bitacora->accion_id = 2; // Show (Consulta)
          $bitacora->details = 'sipei_unidades (ID:'.$unidad->id.')';
          $bitacora->device = $request->header('User_Agent');
          $bitacora->ip_address = $request->ip();
          $bitacora->save();         

          return view('SIPEI.unidades.create', array('tipo' => 3, 'unidad' => $unidad));
        }else{
          return redirect()->route('unidades.index');
        }    
      }
    
      public function edit(Request $request, $unidade){
        $unidad = Unidad::find($unidade);
        if(collect($unidad)->isNotEmpty()){
          return view('SIPEI.unidades.create', array('tipo' => 2, 'unidad' => $unidad));
        }else{
          return redirect()->route('unidades.index');
        }
      }
    
      public function update(Request $request, $unidade){
        $request->validate([
          'unidad' => ['required', 'string', 'max:255'],          
        ]);         
        
        $unidad = Unidad::find($unidade);
        if($unidad->unidad!=$request->unidad){ $unidad->unidad=$request->unidad; }       
    
        $alert = array('title' => '', 'text' => '', 'icon' => '');
        if($unidad->update()){
          // Bitácora
          $bitacora = new Bitacora();
          $bitacora->date=Carbon::now();
          $bitacora->usuario_id = Auth::user()->id;
          $bitacora->accion_id = 3; // Update (Actualización)
          $bitacora->details = 'sipei_unidades (ID:'.$unidad->id.')';
          $bitacora->device = $request->header('User_Agent');
          $bitacora->ip_address = $request->ip();
          $bitacora->save();

          $alert['title'] = 'Unidad actualizada';
          $alert['subtitle'] = 'La unidad ha sido actualizada exitosamente';
          $alert['icon'] = 'success';
        }else{
          $alert['title'] = 'Error';
          $alert['subtitle'] = 'Ocurrió un error inesperado. No se aplicados los cambios';
          $alert['icon'] = 'error';
        }
        return redirect()->route('unidades.index')->with(array('alert' => $alert));
      }
    
      public function destroy(Request $request, $unidade){
        $unidad = Unidad::find($unidade);
        if(collect($unidad)->isNotEmpty()){
          $unidad->status = false;
          $unidad->deleted_at = Carbon::now();
        }
    
        $alert = array('title' => '', 'text' => '', 'icon' => '');
        if($unidad->update()){
          // Bitácora
          $bitacora = new Bitacora();
          $bitacora->date=Carbon::now();
          $bitacora->usuario_id = Auth::user()->id;
          $bitacora->accion_id = 4; // Delete (Baja)
          $bitacora->details = 'sipei_unidades (ID:'.$unidad->id.')';
          $bitacora->device = $request->header('User_Agent');
          $bitacora->ip_address = $request->ip();
          $bitacora->save();

          $alert['title'] = 'Unidad desactivada';
          $alert['subtitle'] = 'La unidad ha sido desactivada exitosamente';
          $alert['icon'] = 'success';
        }else{
          $alert['title'] = 'Error';
          $alert['subtitle'] = 'Ocurrió un error inesperado. No se aplicados los cambios';
          $alert['icon'] = 'error';
        }
        return redirect()->route('unidades.index')->with(array('alert' => $alert));
    
      }
    
      public function restore(Request $request, $unidade){
        $unidad = Unidad::find($unidade);
        if(collect($unidad)->isNotEmpty()){
          $unidad->status = true;
        }
    
        $alert = array('title' => '', 'text' => '', 'icon' => '');
        if($unidad->update()){
          // Bitácora
          $bitacora = new Bitacora();
          $bitacora->date=Carbon::now();
          $bitacora->usuario_id = Auth::user()->id;
          $bitacora->accion_id = 5; // Restore (Restauración)
          $bitacora->details = 'sipei_unidades (ID:'.$unidad->id.')';
          $bitacora->device = $request->header('User_Agent');
          $bitacora->ip_address = $request->ip();
          $bitacora->save();

          $alert['title'] = 'Unidad reactivada';
          $alert['subtitle'] = 'La unidad ha sido reactivada exitosamente';
          $alert['icon'] = 'success';
        }else{
          $alert['title'] = 'Error';
          $alert['subtitle'] = 'Ocurrió un error inesperado. No se aplicados los cambios';
          $alert['icon'] = 'error';
        }
        return redirect()->route('unidades.index')->with(array('alert' => $alert));
      }

}
