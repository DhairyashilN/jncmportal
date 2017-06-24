<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerenquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name', 100);
            $table->longText('address');
            $table->longText('short_description');
            $table->bigInteger('contact1');
            $table->bigInteger('contact2');
            $table->string('email');
            $table->string('enquiry_date',50);
            $table->string('enquiry_time',50);
            $table->integer('isDelete')->default(0);
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
        Schema::dropIfExists('customerenquiries');
    }
}
