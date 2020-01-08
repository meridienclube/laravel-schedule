<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');  /*Usuario que criou a regra*/
            $table->boolean('status')->default(true);
            $table->string('title');                /*Titulo meramente informativo*/
            $table->string('type')->nullable();     /*'synchronous' para fazer imediatamente || 'scheduling' para agendar um periodo*/
            $table->string('what')->nullable();     /*O que vamos executar - ex: enviar email ou abrir uma tarefa*/
            $table->string('where')->nullable();    /*Onde executar - Classe que sera atingida*/
            $table->string('when')->nullable();     /*Quando executar - Momentos dos observers*/
            $table->text('options')->nullable();    /*Configurações adicionais*/
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
