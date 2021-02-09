<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('experience')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->comment('status 1=active;0=inactive');
            $table->unsignedBigInteger('created_by')->nullable()->comment('FK: users.id/Customers.id');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('FK: users.id/Customers.id');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamp('deleted_at')->useCurrent();
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
        Schema::dropIfExists('work_experiences');
    }
}
