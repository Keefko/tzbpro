<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("adress");
            $table->string("ico");
            $table->string("dic");
            $table->string("icdph");
            $table->string("bank");
            $table->string("mail");
            $table->string("phone");
            $table->longText("text");
            $table->longText("certificates");
            $table->string("img");
            $table->string("heading1");
            $table->string("heading2");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
