<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TicketModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('usuario_id');
            $table->integer('asignado_id')->nullable();
            $table->integer('tipo')->nullable(); // clasificacion
            $table->integer('categoria_id')->nullable();
            $table->integer('urgencia')->nullable();
            $table->integer('impacto')->nullable();
            $table->integer('estado')->default(TicketModel::CREADO);
            $table->string('fecha_creacion_txt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
};
