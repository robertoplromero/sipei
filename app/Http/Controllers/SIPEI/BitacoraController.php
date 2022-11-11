<?php

namespace App\Http\Controllers\SIPEI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Eloquent ORM
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    public function index(){
        $bitacora = DB::table('sipei_bitacora as b')
        ->select('b.id as bitacora_id', 'b.date', 'u.username', 'a.accion', 'b.details')
        ->join('sipei_usuarios as u', 'u.id', 'b.usuario_id')
        ->join('sipei_bitacora_acciones as a', 'a.id', 'b.accion_id')
        ->latest('b.id')->take(20)->get();
        return view('SIPEI.bitacora.index', compact('bitacora'));
        
    }

    // public function add(){
    //     return 0;
    // }
}
