<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id')->nullable()->comment('FK: division_id.id');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->unsignedBigInteger('district_id')->nullable()->comment('FK: district_id.id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('service_type_id')->nullable()->comment('FK: service_type_id.id');
            $table->foreign('service_type_id')->references('id')->on('service_types');
            $table->string('charge')->nullable();
            $table->string('zone_name')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->comment('status 1=active;0=inactive');
            $table->unsignedBigInteger('created_by')->nullable()->comment('FK: users.id');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('FK: users.id');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->unsignedBigInteger('deleted_by')->nullable()->comment('FK: users.id');
            $table->foreign('deleted_by')->references('id')->on('users');

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
        Schema::dropIfExists('zones');
    }
}
