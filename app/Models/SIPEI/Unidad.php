<?php

namespace App\Models\SIPEI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model{
    use HasFactory;
    protected $table = 'sipei_unidades';
    protected $fillable = ['unidad'];
}
