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
        Schema::create('client_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('hours_from')->comment('Кол-во часов начиная с которого клиент попадает в эту группу');
            $table->integer('hours_to')->comment('Кол-во часов до которого клиент попадает в эту группу');
            $table->integer('discount')->default(0)->comment('Скидка в процентах для этой группы');
            $table->integer('birthday_bonus')->default(0)->comment('Бонус на день рождения (в день рождения процент скидки меняется на значение из этого столбца)');
            $table->integer('club_id');
            $table->integer('sequence_number');
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
        Schema::dropIfExists('client_group');
    }
};
