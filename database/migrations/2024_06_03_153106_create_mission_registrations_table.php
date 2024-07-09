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
        Schema::create('mission_registrations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("contact");
            $table->string("institution");
            $table->string("gender");
            $table->unsignedBigInteger("mission_id");
            $table->timestamps();

            $table->foreign("mission_id")->references("id")->on("missions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_registrations');
    }
};
