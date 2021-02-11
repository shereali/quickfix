<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstantCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instant_calls', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('status')->nullable()->comment('FK: instant_call_statuses.id');
            $table->foreign('status')->references('id')->on('instant_call_statuses');
            $table->tinyInteger('job_status')->nullable()->comment('0 = No , 1 = Yes');                     
            $table->text('remarks')->nullable(); 
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
        Schema::dropIfExists('instant_calls');
    }
}
