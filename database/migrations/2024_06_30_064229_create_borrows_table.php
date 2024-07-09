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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('borrower_name');
            $table->string('borrower_contact');
            $table->string('ausaa_guarantor');
            $table->date('borrowing_date');
            $table->date('return_date');
            $table->string('details');
            $table->unsignedBigInteger('logged_by');
            $table->boolean('isReturned')->default(false);
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('inventories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
