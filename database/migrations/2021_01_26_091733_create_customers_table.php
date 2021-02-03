<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_type')->nullable()->comment('1=general customer,2=corporate clients,3=business partner');
            $table->string('name')->nullable()->comment('customer name/Company name');
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('verify_status')->nullable()->comment('0=not verified, 1=verified');
            $table->string('verfied_code')->nullable();
            $table->integer('otp')->nullable();
            $table->text('firebase_token')->nullable();
            $table->text('web_token')->nullable();
            $table->tinyInteger('signup_status')->nullable()->comment('0=new, 1=old');
            $table->text('password')->nullable();
            $table->text('rember_token')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('created_by_type')->nullable()->comment('1=Admin;2=Customer;3=Customer support');
            $table->unsignedBigInteger('created_by')->nullable()->comment('FK: users.id/Customers.id');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_type')->nullable()->comment('1=Admin;2=Customer;3=Customer support');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('FK: users.id/Customers.id');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamp('deleted_at')->useCurrent();
            $table->unsignedBigInteger('deleted_by_type')->nullable()->comment('1=Admin;2=Customer;3=Customer support');
            $table->unsignedBigInteger('deleted_by')->nullable()->comment('FK: users.id/Customers.id');
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
        Schema::dropIfExists('customers');
    }
}
