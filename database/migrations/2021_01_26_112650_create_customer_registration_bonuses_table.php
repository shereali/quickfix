<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerRegistrationBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_registration_bonuses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->float('amount')->nullable();
            $table->integer('user_type')->nullable()->comment('1=customer,2=vendor,3=both');
            $table->string('image')->nullable();
            $table->tinyInteger('bonus_type')->nullable()->comment('1=Registration;1=Referal');
            $table->tinyInteger('status')->comment('status 1=active;0=inactive');
            $table->unsignedBigInteger('created_by')->nullable()->comment('FK: users.id');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('FK: users.id');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamp('deleted_at')->useCurrent();
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
        Schema::dropIfExists('customer_registration_bonuses');
    }
}
