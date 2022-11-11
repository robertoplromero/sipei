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
        Schema::create('sipei_usuarios', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('username')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->char('sexo', 1);
            $table->unsignedBigInteger('grado_academico_id');
            $table->unsignedBigInteger('unidad_id');
            $table->string('detalle')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable(true)->default(null);
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('sipei_usuarios');
    }
};