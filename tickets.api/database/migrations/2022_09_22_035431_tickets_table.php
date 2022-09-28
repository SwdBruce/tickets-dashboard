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
            $table->integer('usuario_id');
            $table->integer('asignado_id')->nullable();
            $table->integer('categoria_id')->foreign('categoria_id')->references('id')->on('categoria');
            $table->integer('area_id');
            $table->integer('estado')->default(TicketModel::CREADO);
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
        //
    }
};
