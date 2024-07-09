<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('quantity');
            $table->integer('purchase_year');
            $table->integer('purchase_price');
            $table->string('condition');
            $table->string('receipt')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('logged_by');
            $table->timestamps();

            $table->foreign('logged_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
