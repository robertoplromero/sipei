<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//  Importar para asignar contraseña
use Illuminate\Support\Facades\Hash;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sipei_grados_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('grado_academico');
            $table->string('grado');
        });

        DB::table('sipei_grados_academicos')->insert([
            array('id' => 1, 'grado_academico' => 'No especificado', 'grado' => ''),
            array('id' => 2, 'grado_academico' => 'Licenciatura', 'grado' => 'Lic.'),
            array('id' => 3, 'grado_academico' => 'Maestría', 'grado' => 'Mtro.'),
            array('id' => 4, 'grado_academico' => 'Doctorado', 'grado' => 'Dr.'),
            array('id' => 5, 'grado_academico' => 'Arquitectura', 'grado' => 'Arq.'),
            array('id' => 6, 'grado_academico' => 'Biología', 'grado' => 'Biól.'),
            array('id' => 7, 'grado_academico' => 'Contaduría Pública', 'grado' => 'C.P.'),
            array('id' => 8, 'grado_academico' => 'Ingeniería', 'grado' => 'Ing.'),
            array('id' => 9, 'grado_academico' => 'Psicología', 'grado' => 'Psic.'),
            array('id' => 10, 'grado_academico' => 'Técnico Universitario', 'grado' => 'Tec.')
            
        ]);
        Schema::table('sipei_usuarios', function (Blueprint $table) {
            $table->foreign('grado_academico_id')->references('id')->on('sipei_grados_academicos');
        });

        DB::table('sipei_usuarios')->insert([
            array(
                'id' => 343,
                'username' => 'robertoplr',
                'nombre' => 'Roberto',
                'apellido_paterno' => 'López',
                'sexo' => 'h',
                'grado_academico_id' => 8,
                'unidad_id' => 245,
                'detalle' => 'Admin',
                'email' => 'roberto.lopez@uaem.mx',
                'password' => Hash::make('Temporal'),
                'deleted_at' => null)
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('sipei_usuarios', function (Blueprint $table) {
            $table->dropForeign('sipei_usuarios_grado_academico_id_foreign');
        });
        Schema::dropIfExists('sipei_grados_academicos');
    }
};
