<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremisesScheduleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premises_schedule_details', function (Blueprint $table) {
            $table->id();
            $table->integer('premises_schedule_masters_id')->default(0)->comment('FK:premises_schedule_masters.id');
            $table->integer('day_id')->nullable()->comment('FK:days.id');
            $table->date('schedule_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->tinyInteger('status')->nullable()->comment('0=free, 1=Active/Booked, 2=Completed, 3=Cancelled');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_by')->nullable();
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
        Schema::dropIfExists('premises_schedule_details');
    }
}
