<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('houseno');
            $table->string('billingfor');
            $table->string('expectedamount');
            $table->string('amountpaid');
            $table->string('balance');
            $table->string('datepaid');
            $table->string('post_id')->default('0');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
