<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_problems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('device_id')->nullable()->comment('FK: devices.id');
            $table->foreign('device_id')->references('id')->on('devices');
            $table->unsignedBigInteger('device_functional_type_id')->nullable()->comment('FK: device_functional_types.id');
            $table->foreign('device_functional_type_id')->references('id')->on('device_functional_types');
            $table->unsignedBigInteger('service_type_id')->nullable()->comment('FK: service_types.id');
            $table->foreign('service_type_id')->references('id')->on('service_types');
            $table->unsignedBigInteger('brand_id')->nullable()->comment('FK: brands.id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('device_model_id')->nullable()->comment('FK: device_models.id');
            $table->foreign('device_model_id')->references('id')->on('device_models');
            $table->unsignedBigInteger('problem_type_id')->nullable()->comment('FK: problem_types.id');
            $table->foreign('problem_type_id')->references('id')->on('problem_types');
            $table->string('problem')->nullable();
            $table->text('description')->nullable();
            $table->float('original_price')->nullable();
            $table->float('master_copy_price')->nullable();
            $table->tinyInteger('status')->comment('status 1=active;0=inactive');
            $table->unsignedBigInteger('created_by_type')->nullable()->comment('1=Admin;2=Customer support');
            $table->unsignedBigInteger('created_by')->nullable()->comment('FK: users.id');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_type')->nullable()->comment('1=Admin;2=Customer support');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('FK: users.id');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->unsignedBigInteger('deleted_by_type')->nullable()->comment('1=Admin;2=Customer support');
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
        Schema::dropIfExists('device_problems');
    }
}
