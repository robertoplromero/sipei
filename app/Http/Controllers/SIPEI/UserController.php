<?php

namespace App\Http\Controllers\SIPEI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
// Usuario
use Illuminate\Support\Facades\Auth;

// Importación de modelos
use App\Models\User;
use App\Models\SIPEI\Unidad;
use App\Models\SIPEI\GradoAcademico;
use Carbon\Carbon;
// Bitácora
use App\Models\SIPEI\Bitacora;

class UserController extends Controller
{
    
  public function index(Request $request)
  {
    $usuarios = User::select('id', 'nombre', 'apellido_paterno', 'apellido_materno', 'username', 'status', 'sexo', 'unidad_id', 'grado_academico_id')->with('unidad')->with('grado_academico')->get();    
    return view('SIPEI.usuarios.index', compact('usuarios'));
  }

  public function create()
  {
    $unidades = Unidad::select('id', 'unidad')->where('status', '=', true)->get();
    $grados_academicos = GradoAcademico::all();  
    return view('SIPEI.usuarios.create', array('tipo' => 1, 'unidades' => $unidades, 'grados_academicos' => $grados_academicos));
  }

  public function store(Request $request)
  {
    $request->validate([
      'username' => ['required', 'string', 'max:255', 'unique:sipei_usuarios'],
      'nombre' => ['required', 'string', 'max:150'],
      'apellido_paterno' => ['required', 'string', 'max:150'],
      'apellido_materno' => ['string', 'max:150', 'nullable'],
      'sexo' => ['required', 'string', 'min:1', 'max:1'],
      'grado_academico' => ['required', 'numeric'],
      'unidad' => ['required', 'numeric'],
      'detalle' => ['string', 'max:255'],
      'email' => ['string', 'max:255', 'email'],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);      
    $usuario = User::create([
      'username' => $request->username,
      'nombre' => $request->nombre,
      'apellido_paterno' => $request->apellido_paterno,
      'apellido_materno' => $request->apellido_materno,
      'sexo' => $request->sexo,
      'grado_academico_id' => $request->grado_academico,
      'unidad_id' => $request->unidad,
      'detalle' => $request->detalle,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'deleted_at' => null
    ]);

    $alert = null;
    if($usuario->id!=null){
      // Bitácora
      $bitacora = new Bitacora();
      $bitacora->date=Carbon::now();
      $bitacora->usuario_id = Auth::user()->id;
      $bitacora->accion_id = 1; // Store (Guardado)
      $bitacora->details = 'sipei_usuarios (ID:'.$usuario->id.')';
      $bitacora->device = $request->header('User_Agent');
      $bitacora->ip_address = $request->ip();
      $bitacora->save();
      // Notificación
      $alert = array('title' => 'Usuario registrado', 'subtitle' => 'El usuario se ha registrado exitosamente', 'icon' => 'success');
    }else{
      // Notificación
      $alert = array('title' => 'Error', 'subtitle' => 'Ocurrió un error', 'icon' => 'error');
    }
    return redirect()->route('usuarios.index')->with(array('alert' => $alert));
  }

  public function show(Request $request, $usuario)
  {
    $usuario = User::find($usuario);
    $unidades = Unidad::select('id', 'unidad')->where('status', '=', true)->get();
    $grados_academicos = GradoAcademico::all();
    if(collect($usuario)->isNotEmpty()){
       // Bitácora
       $bitacora = new Bitacora();
       $bitacora->date=Carbon::now();
       $bitacora->usuario_id = Auth::user()->id;
       $bitacora->accion_id = 2; // Show (Consulta)
       $bitacora->details = 'sipei_usuarios (ID:'.$usuario->id.')';
       $bitacora->device = $request->header('User_Agent');
       $bitacora->ip_address = $request->ip();
       $bitacora->save();
      return view('SIPEI.usuarios.create', array('tipo' => 3, 'usuario' => $usuario, 'unidades' => $unidades, 'grados_academicos' => $grados_academicos));
    }else{
      return redirect()->route('usuarios.index');
    }    
  }

  public function edit(Request $request, $usuario)
  {
    $usuario = User::find($usuario);
    $unidades = Unidad::select('id', 'unidad')->where('status', '=', true)->get();
    $grados_academicos = GradoAcademico::all();      
    if(collect($usuario)->isNotEmpty()){
      return view('SIPEI.usuarios.create', array('tipo' => 2, 'usuario' => $usuario, 'unidades' => $unidades, 'grados_academicos' => $grados_academicos));
    }else{
      return redirect()->route('usuarios.index');
    }
  }

  public function update(Request $request, $usuario)
  {
    $request->validate([
      'username' => ['required', 'string', 'max:255'],
      'nombre' => ['required', 'string', 'max:150'],
      'apellido_paterno' => ['required', 'string', 'max:150'],
      'apellido_materno' => ['string', 'max:150'],
      'sexo' => ['required', 'string', 'min:1', 'max:1'],
      'grado_academico' => ['required', 'numeric'],
      'unidad' => ['required', 'numeric'],
      'detalle' => ['string', 'max:255', 'nullable'],
      'email' => ['string', 'max:255', 'email']
    ]); 
    // Si el campo de contraseña contiene algo se actualiza
    if($request->password!=null && $request->password!='')
    {
      $request->validate(['password' => ['required', 'confirmed', Rules\Password::defaults()]]);
    }
    
    $usuario = User::find($usuario);
    if($usuario->username!=$request->username){ $usuario->username=$request->username; }
    if($usuario->nombre!=$request->nombre){ $usuario->nombre=$request->nombre; }
    if($usuario->apellido_paterno!=$request->apellido_paterno){ $usuario->apellido_paterno=$request->apellido_paterno; }
    if($usuario->apellido_materno!=$request->apellido_materno){ $usuario->apellido_materno=$request->apellido_materno; }
    if($usuario->sexo!=$request->sexo){ $usuario->sexo=$request->sexo; }
    if($usuario->grado_academico_id!=$request->grado_academico){ $usuario->grado_academico_id=$request->grado_academico; }
    if($usuario->unidad_id!=$request->unidad){ $usuario->unidad_id=$request->unidad; }
    if($usuario->detalle!=$request->detalle){ $usuario->detalle=$request->detalle; }
    if($usuario->email!=$request->email){ $usuario->email=$request->email; }
    if($request->password!=null && $request->password!='' && $usuario->password!= Hash::make($request->password) ){ $usuario->password= Hash::make($request->password); }

    $alert = null;
    if($usuario->update()){
      // Bitácora
      $bitacora = new Bitacora();
      $bitacora->date=Carbon::now();
      $bitacora->usuario_id = Auth::user()->id;
      $bitacora->accion_id = 3; // Update (Actualización)
      $bitacora->details = 'sipei_usuarios (ID:'.$usuario->id.')';
      $bitacora->device = $request->header('User_Agent');
      $bitacora->ip_address = $request->ip();
      $bitacora->save();

     // Notificación
     $alert = array('title' => 'Usuario actualizado', 'subtitle' => 'El usuario se ha actualizado exitosamente', 'icon' => 'success');
    }else{
     // Notificación
     $alert = array('title' => 'Error', 'subtitle' => 'Ocurrió un error', 'icon' => 'error');
    }
    return redirect()->route('usuarios.index')->with(array('alert' => $alert));
  }

  public function destroy(Request $request, $usuario)
  {
    $usuario = User::find($usuario);
    if(collect($usuario)->isNotEmpty()){
      $usuario->status = false;
      $usuario->deleted_at = Carbon::now();
    }

    $alert = null;
    if($usuario->update()){
      // Bitácora
      $bitacora = new Bitacora();
      $bitacora->date=Carbon::now();
      $bitacora->usuario_id = Auth::user()->id;
      $bitacora->accion_id = 4; // Delete (Bajas)
      $bitacora->details = 'sipei_usuarios (ID:'.$usuario->id.')';
      $bitacora->device = $request->header('User_Agent');
      $bitacora->ip_address = $request->ip();
      $bitacora->save();

      // Notificación
      $alert = array('title' => 'Usuario desactivado', 'subtitle' => 'El usuario se ha desactivado exitosamente', 'icon' => 'success');
    }else{
     // Notificación
     $alert = array('title' => 'Error', 'subtitle' => 'Ocurrió un error', 'icon' => 'error');
    }
    return redirect()->route('usuarios.index')->with(array('alert' => $alert));

  }

  public function restore(Request $request, $usuario)
  {
    $usuario = User::find($usuario);
    if(collect($usuario)->isNotEmpty()){
      $usuario->status = true;
    }

    $alert = null;
    if($usuario->update()){
      // Bitácora
      $bitacora = new Bitacora();
      $bitacora->date=Carbon::now();
      $bitacora->usuario_id = Auth::user()->id;
      $bitacora->accion_id = 5; // Restore (Anular baja)
      $bitacora->details = 'sipei_usuarios (ID:'.$usuario->id.')';
      $bitacora->device = $request->header('User_Agent');
      $bitacora->ip_address = $request->ip();
      $bitacora->save();

      // Notificación
      $alert = array('title' => 'Usuario restaurado', 'subtitle' => 'El usuario se ha restaurado exitosamente', 'icon' => 'success');
    }else{
      // Notificación
      $alert = array('title' => 'Error', 'subtitle' => 'Ocurrió un error', 'icon' => 'error');
    }
    return redirect()->route('usuarios.index')->with(array('alert' => $alert));
  }

}