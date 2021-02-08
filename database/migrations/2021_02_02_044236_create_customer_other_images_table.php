<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOtherImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_other_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable()->comment('FK: customers.id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->nullable()->comment('1=active, 0=inactive');
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
        Schema::dropIfExists('customer_other_images');
    }
}
