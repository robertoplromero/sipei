<?php

namespace App\Models\SIPEI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoCorte extends Model{
    use HasFactory;

    protected $table = 'sipei_historico_cortes';

    public $timestamps = true;

    protected $fillable = ['fecha_corte', 'detalle'];
}
