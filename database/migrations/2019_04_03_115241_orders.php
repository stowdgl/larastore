<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('orders'))
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('fio');
                $table->string('email');
                $table->string('city');
                $table->string('phone');
                $table->string('npo');
                $table->string('paymentmeth');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
