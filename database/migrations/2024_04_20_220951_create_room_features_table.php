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
        Schema::create('room_features', function (Blueprint $table) {
            $table->id();
            $table->text('type');
            $table->unsignedBigInteger('number_of_rooms');
            $table->unsignedBigInteger('number_of_beds');
            $table->boolean('bathroom')->default(false);
            $table->boolean('balcony')->default(false);
            $table->boolean('workspace')->default(false);
            $table->boolean('TV')->default(false);
            $table->boolean('wifi')->default(false);
            $table->boolean('minibar')->default(false);
            $table->decimal('price', 8, 2);      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_features');
    }
};