<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_partners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable()->comment('FK: customers.id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_number')->nullable();
            $table->string('designation')->nullable();
            $table->unsignedBigInteger('division_id')->nullable()->comment('FK: divisions.id');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->unsignedBigInteger('district_id')->nullable()->comment('FK: districts.id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('zone_id')->nullable()->comment('FK: zones.id');
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->string('address')->nullable();
            $table->string('web_address')->nullable();
            $table->string('no_of_employee')->nullable();
            $table->string('device_type_id')->nullable()->comment('FK: device_types.id');
            $table->string('device_functional_type_id')->nullable()->comment('FK: device_functional_types.id');
            $table->unsignedBigInteger('work_experience_id')->nullable()->comment('FK: work_experiences.id');
            $table->foreign('work_experience_id')->references('id')->on('work_experiences');
            $table->string('nid_no')->nullable();
            $table->string('nid_image')->nullable();
            $table->unsignedBigInteger('experience_category_id')->nullable()->comment('FK: exprience_categories.id');
            $table->foreign('experience_category_id')->references('id')->on('exprience_categories');
            $table->string('tradelicense_image')->nullable();
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
        Schema::dropIfExists('business_partners');
    }
}
