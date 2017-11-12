<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('type_of_caller')->nullable();
            $table->string('address')->nullable();
            $table->string('division')->nullable();
            $table->string('category')->nullable();
            $table->string('sku_price')->nullable();
            $table->string('service_source')->nullable();
            $table->string('product_batch_code')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::drop('crms');
    }
}
