<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sipei_historico_cortes', function (Blueprint $table)
        {
            $table->id()->unique()->autoIncrement();
            $table->date('fecha_corte');
            $table->string('detalle')->nullable()->default(null);
            $table->timestamps();            
            $table->datetime('deleted_at')->nullable(true)->default(null);
            $table->boolean('status')->default(true);
        });

        Schema::create('sipei_historico_usuarios', function (Blueprint $table)
        {
            $table->id()->unique()->autoIncrement();
            $table->unsignedBigInteger('corte_id');
            $table->unsignedBigInteger('usuario_id');
            $table->string('username');
            $table->string('nombre_completo');
            $table->string('sexo');
            $table->unsignedBigInteger('grado_academico_id');
            $table->string('grado_academico');
            $table->unsignedBigInteger('unidad_id');
            $table->string('unidad');
            $table->string('detalle');
            $table->string('estado');
            
            $table->foreign('corte_id')->references('id')->on('sipei_historico_cortes');
            $table->foreign('usuario_id')->references('id')->on('sipei_usuarios');
            $table->foreign('grado_academico_id')->references('id')->on('sipei_grados_academicos');
            $table->foreign('unidad_id')->references('id')->on('sipei_unidades');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sipei_historico_usuarios');
        Schema::dropIfExists('sipei_historico_cortes');
    }
};
