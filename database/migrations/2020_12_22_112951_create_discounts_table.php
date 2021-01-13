<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->nullable()->comment('0 percentage 1 flat_amount');
            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('discount_value')->nullable();
            $table->string('discount_start_date')->nullable();
            $table->string('discount_expire_date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('discounts');
    }
}
