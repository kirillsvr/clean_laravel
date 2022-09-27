<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('client_group_id')->nullable();
            $table->string('lastname', 255)->nullable();
            $table->integer('phone');
            $table->dateTime('birthdate')->nullable();
            $table->float('balance')->default(0);
            $table->float('bonus_balance')->default(0);
            $table->integer('club_id');
            $table->boolean('banned');
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
        Schema::dropIfExists('client');
    }
};
