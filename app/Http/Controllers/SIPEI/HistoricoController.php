<?php

namespace App\Http\Controllers\SIPEI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Eloquent ORM
use Illuminate\Support\Facades\DB;
// Modelo Corte de históricos
use App\Models\SIPEI\HistoricoCorte;

// Bitácora
use App\Models\SIPEI\Bitacora;
// Carbon (date)
use Carbon\Carbon;
// Usuario
use Illuminate\Support\Facades\Auth;

class HistoricoController extends Controller
{
    public function index()
    {
        $cortes = HistoricoCorte::select('id', 'fecha_corte', 'detalle', 'status')->get();
        return view('SIPEI.historico.index', compact('cortes'));
    }

    public function create()
    {
        return view("SIPEI.historico.create", array('tipo' => 1));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_corte' => ['required', 'date_format:Y-m-d', 'unique:sipei_historico_cortes'],
            'detalle' => ['string', 'max:255']
          ]);      
          $corte = HistoricoCorte::create([
            'fecha_corte' => $request->fecha_corte,
            'detalle' => $request->detalle        
          ]);
      
          $alert = null;
          if($corte->id!=null){
            // Bitácora
            $bitacora = new Bitacora();
            $bitacora->date=Carbon::now();
            $bitacora->usuario_id = Auth::user()->id;
            $bitacora->accion_id = 1; // Store (Guardado)
            $bitacora->details = 'sipei_historico_cortes (ID:'.$corte->id.')';
            $bitacora->device = $request->header('User_Agent');
            $bitacora->ip_address = $request->ip();
            $bitacora->save();
            // Notificación
            $alert = array(
                'title' => 'Corte registrado', 
                'subtitle' => 'El corte para histórico se ha registrado exitosamente', 
                'icon' => 'success');
          }else{
            // Notificación
            $alert = array(
                'title' => 'Error', 
                'subtitle' => 'Ocurrió un error', 
                'icon' => 'error'
            );
          }
          return redirect()->route('historicos.index')->with(array('alert' => $alert));
    }

    public function show(Request $request, $historico)
    {
        $corte = HistoricoCorte::find($historico);
        if(collect($corte)->isNotEmpty()){
            // Bitácora
            $bitacora = new Bitacora();
            $bitacora->date=Carbon::now();
            $bitacora->usuario_id = Auth::user()->id;
            $bitacora->accion_id = 2; // Show (Consulta)
            $bitacora->details = 'sipei_historico_cortes (ID:'.$corte->id.')';
            $bitacora->device = $request->header('User_Agent');
            $bitacora->ip_address = $request->ip();
            $bitacora->save();
            return view('SIPEI.historico.create', array('tipo' => 3, 'corte' => $corte));
        }else{
            return redirect()->route('historicos.index');
        }
    }

    public function edit(Request $request, $historico)
    {
        $corte = HistoricoCorte::find($historico);
        if(collect($corte)->isNotEmpty()){
            return view('SIPEI.historico.create', array('tipo' => 2, 'corte' => $corte));
        }else{
            return redirect()->route('historicos.index');
        }
    }

    public function update(Request $request, $historico){
        $request->validate([
          'fecha_corte' => ['required', 'date'],
          'detalle' => ['string', 'max:255']
        ]);         
        
        $corte = HistoricoCorte::find($historico);
        if($corte->fecha_corte!=$request->fecha_corte){ $corte->fecha_corte=$request->fecha_corte; }
        if($corte->detalle!=$request->detalle){ $corte->detalle=$request->detalle; }
    
        $alert = array('title' => '', 'text' => '', 'icon' => '');
        if($corte->update()){
          // Bitácora
          $bitacora = new Bitacora();
          $bitacora->date=Carbon::now();
          $bitacora->usuario_id = Auth::user()->id;
          $bitacora->accion_id = 3; // Update (Actualización)
          $bitacora->details = 'sipei_historico_cortes (ID:'.$corte->id.')';
          $bitacora->device = $request->header('User_Agent');
          $bitacora->ip_address = $request->ip();
          $bitacora->save();

          $alert['title'] = 'Corte actualizado';
          $alert['subtitle'] = 'El corte para histórico ha sido actualizado exitosamente';
          $alert['icon'] = 'success';
        }else{
          $alert['title'] = 'Error';
          $alert['subtitle'] = 'Ocurrió un error inesperado. No se aplicados los cambios';
          $alert['icon'] = 'error';
        }
        return redirect()->route('historicos.index')->with(array('alert' => $alert));
    }

    public function destroy(Request $request, $historico){
        $corte = HistoricoCorte::find($historico);
        if(collect($corte)->isNotEmpty()){
          $corte->status = false;
          $corte->deleted_at = Carbon::now();
        }
    
        $alert = array('title' => '', 'text' => '', 'icon' => '');
        if($corte->update()){
          // Bitácora
          $bitacora = new Bitacora();
          $bitacora->date=Carbon::now();
          $bitacora->usuario_id = Auth::user()->id;
          $bitacora->accion_id = 4; // Delete (Baja)
          $bitacora->details = 'sipei_historico_cortes (ID:'.$corte->id.')';
          $bitacora->device = $request->header('User_Agent');
          $bitacora->ip_address = $request->ip();
          $bitacora->save();

          $alert['title'] = 'Corte desactivado';
          $alert['subtitle'] = 'El corte ha sido desactivado exitosamente';
          $alert['icon'] = 'success';
        }else{
          $alert['title'] = 'Error';
          $alert['subtitle'] = 'Ocurrió un error inesperado. No se aplicados los cambios';
          $alert['icon'] = 'error';
        }
        return redirect()->route('historicos.index')->with(array('alert' => $alert));
    
      }

      public function restore(Request $request, $historico){
        $corte = HistoricoCorte::find($historico);
        if(collect($corte)->isNotEmpty()){
          $corte->status = true;
        }
    
        $alert = array('title' => '', 'text' => '', 'icon' => '');
        if($corte->update()){
          // Bitácora
          $bitacora = new Bitacora();
          $bitacora->date=Carbon::now();
          $bitacora->usuario_id = Auth::user()->id;
          $bitacora->accion_id = 5; // Restore (Restauración)
          $bitacora->details = 'sipei_historico_cortes (ID:'.$corte->id.')';
          $bitacora->device = $request->header('User_Agent');
          $bitacora->ip_address = $request->ip();
          $bitacora->save();

          $alert['title'] = 'Corte reactivado';
          $alert['subtitle'] = 'El corte ha sido reactivado exitosamente';
          $alert['icon'] = 'success';
        }else{
          $alert['title'] = 'Error';
          $alert['subtitle'] = 'Ocurrió un error inesperado. No se aplicados los cambios';
          $alert['icon'] = 'error';
        }
        return redirect()->route('historicos.index')->with(array('alert' => $alert));
      }
        
}