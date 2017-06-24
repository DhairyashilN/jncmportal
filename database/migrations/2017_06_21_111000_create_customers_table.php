<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('customer_name', 100);
            $table->longText('address');
            $table->string('city',50);
            $table->string('district',50);
            $table->string('state',50);
            $table->string('country',50);
            $table->bigInteger('contact')->nullable();
            $table->string('email')->nullable();
            $table->integer('machine');
            $table->integer('quantity');
            $table->string('purchase_date',50);
            $table->string('purchase_year',50);
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
        Schema::dropIfExists('customers');
    }
}
