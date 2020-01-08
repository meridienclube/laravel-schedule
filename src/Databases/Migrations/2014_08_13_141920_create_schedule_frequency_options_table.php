<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleFrequencyOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_frequency_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('frequency');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('option_schedule_frequency_option', function (Blueprint $table) {
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('frequency_id');

            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onDelete('cascade');

            $table->foreign('frequency_id')
                ->references('id')
                ->on('schedule_frequency_options')
                ->onDelete('cascade');

            $table->primary(['option_id', 'frequency_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_schedule_frequency_option');
        Schema::dropIfExists('schedule_frequency_options');
    }
}
