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
        Schema::create('mission_sites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id');
            $table->string('site');
            $table->unsignedBigInteger('member_id');
            $table->string('role')->default('Member');
            $table->string('confirmed')->nullable();
            $table->timestamps();

            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('mission_registrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_sites');
    }
};
