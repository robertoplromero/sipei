<?php

namespace App\Models\SIPEI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Importación de modelos
use App\Models\User;
use App\Models\SIPEI\BitacoraAccion;

class Bitacora extends Model{
    use HasFactory;

    protected $table = 'sipei_bitacora';

    public $timestamps = false;

    // Relaciones
    public function accion(){
        return $this->belongsTo(BitacoraAccion::class, 'accion_id', 'id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
}
