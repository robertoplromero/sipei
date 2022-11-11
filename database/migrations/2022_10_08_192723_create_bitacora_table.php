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
    public function up(){
        Schema::create('sipei_bitacora_acciones', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('accion');
        });
        DB::table('sipei_bitacora_acciones')->insert([
            array('id' => 1, 'accion' => 'Store'),
            array('id' => 2, 'accion' => 'Show'),
            array('id' => 3, 'accion' => 'Update'),
            array('id' => 4, 'accion' => 'Delete'),
            array('id' => 5, 'accion' => 'Restore')
        ]);
        Schema::create('sipei_bitacora', function (Blueprint $table) {
            $table->id();
            $table->datetime('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('accion_id');
            $table->string('details');
            $table->string('device');
            $table->string('ip_address');
            $table->foreign('usuario_id')->references('id')->on('sipei_usuarios');
            $table->foreign('accion_id')->references('id')->on('sipei_bitacora_acciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('sipei_bitacora', function (Blueprint $table) {
            $table->dropForeign('sipei_bitacora_accion_id_foreign');
        });
        Schema::table('sipei_bitacora', function (Blueprint $table) {
            $table->dropForeign('sipei_bitacora_usuario_id_foreign');
        });
        Schema::dropIfExists('sipei_bitacora_acciones');
        Schema::dropIfExists('sipei_bitacora');
    }
};
