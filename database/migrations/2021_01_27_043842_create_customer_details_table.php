<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable()->comment('FK: customers.id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('division_id')->nullable()->comment('FK: divisions.id');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->unsignedBigInteger('district_id')->nullable()->comment('FK: districts.id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('zone_id')->nullable()->comment('FK: zones.id');
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('referral_id')->nullable()->comment('FK: customers.id');
            $table->foreign('referral_id')->references('id')->on('customers');
            $table->float('coins')->nullable();
            $table->float('bonus_amounts')->nullable();
            

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
        Schema::dropIfExists('customer_details');
    }
}
