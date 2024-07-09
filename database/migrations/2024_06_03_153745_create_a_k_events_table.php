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
        Schema::create('a_k_events', function (Blueprint $table) {
            $table->id();
            $table->string('cover')->nullable();
            $table->string('event_title');
            $table->unsignedBigInteger('user_id');
            $table->string('department')->default('Events');
            $table->date('event_date');
            $table->time('event_time');
            $table->longText('event_desc');
            $table->string('permissions')->default('General');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_k_events');
    }
};
