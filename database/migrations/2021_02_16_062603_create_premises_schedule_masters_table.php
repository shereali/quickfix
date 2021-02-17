<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremisesScheduleMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premises_schedule_masters', function (Blueprint $table) {
            $table->bigIncrements('id', 20);
            $table->string('schedule_day')->comment('FK:days.id');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->integer('schedule_create_id')->nullable()->comment('Fk:schedule_creates.id');
            $table->string('schedule_duration')->nullable()->comment('Minutes');
            $table->tinyInteger('repeat_status')->nullable()->comment('0=No, 1=Yes, Default 1 value');
            $table->integer('repeat_schedule')->nullable()->comment('Fk:schedule_creates.id');
            $table->tinyInteger('status')->nullable()->comment('0=Inactive Schedule, 1=Active Schedule');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('premises_schedule_masters');
    }
}
