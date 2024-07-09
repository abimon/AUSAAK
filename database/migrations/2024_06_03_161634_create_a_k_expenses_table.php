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
        Schema::create('a_k_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('treasurer_id');
            $table->string('purpose');
            $table->string('recepient');
            $table->integer('amount');
            $table->timestamps();
            
            $table->foreign('account_id')->references('id')->on('a_k_accounts')->onDelete('cascade');
            $table->foreign('treasurer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_k_expenses');
    }
};
