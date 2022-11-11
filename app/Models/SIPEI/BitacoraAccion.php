<?php

namespace App\Models\SIPEI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitacoraAccion extends Model
{
    use HasFactory;

    protected $table = 'sipei_bitacora_acciones';

    public $timestamps = false;
}
