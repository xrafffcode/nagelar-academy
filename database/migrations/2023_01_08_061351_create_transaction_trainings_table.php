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
        Schema::create('transaction_trainings', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('training_id');
            $table->string('transaction_code');
            $table->string('name');
            $table->string('email');
            $table->integer('transaction_total');
            $table->string('transaction_status');


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
        Schema::dropIfExists('transaction_trainings');
    }
};
