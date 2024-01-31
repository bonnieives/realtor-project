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
        Schema::create('properties', function (Blueprint $table) {
            $table->string('PropertyId')->primary();
            $table->string('OwnerId');
            $table->foreign('OwnerId')->references('UserId')->on('myusers');
            $table->string('StatusId');
            $table->foreign('StatusId')->references('StatusId')->on('status');
            $table->unsignedInteger('CivicNumber');
            $table->string('Address');
            $table->unsignedInteger('Apartment');
            $table->string('Zip');
            $table->string('City');
            $table->string('Province');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
