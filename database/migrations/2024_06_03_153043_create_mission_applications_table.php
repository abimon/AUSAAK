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
        Schema::create('mission_applications', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("contact");
            $table->string("church");
            $table->string("district");
            $table->string("field");
            $table->string("county");
            $table->string("subcounty");
            $table->string("area");
            $table->string("year")->nullable();
            $table->string("projects")->nullable();
            $table->string("baptisms")->nullable();
            $table->string("retentions")->nullable();
            $table->string("dominant_church")->nullable();
            $table->string("other_churches")->nullable();
            $table->string("economic")->nullable();
            $table->string("social")->nullable();
            $table->string("needs")->nullable();
            $table->string("transport")->nullable();
            $table->string("condition")->nullable();
            $table->string("water")->nullable();
            $table->string("floods")->nullable();
            $table->string("w_source")->nullable();
            $table->string("security")->nullable();
            $table->string("chief")->nullable();
            $table->string("electricity")->nullable();
            $table->string("energy")->nullable();
            $table->string("accommodation")->nullable();
            $table->string("hostel")->nullable();
            $table->boolean("confirm")->default(false);
            $table->boolean("isPicked")->default(false);
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
        Schema::dropIfExists('mission_applications');
    }
};
