<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('vendor', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('store_name')->nullable();
            $table->string('store_address')->nullable();
            $table->string('store_description')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('banner_picture')->nullable();
            $table->string('phone_number')->nullable();
            //$table->boolean('is_editor')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('vendor');
    }
}
