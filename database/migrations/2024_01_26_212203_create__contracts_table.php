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
        Schema::create('contracts', function (Blueprint $table) {
            $table->string('ContractId')->primary();
            $table->string('TenantId');
            $table->foreign('TenantId')->references('UserId')->on('myusers');
            $table->string('PropertyId');
            $table->foreign('PropertyId')->references('PropertyId')->on('properties');
            $table->date('InitialDate');
            $table->date('FinalDate');
            $table->decimal('Value', 10, 2);
            $table->unsignedInteger('PayDay');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
