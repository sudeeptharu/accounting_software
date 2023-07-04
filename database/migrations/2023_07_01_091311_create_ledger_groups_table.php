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
        Schema::create('ledger_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('identifier')->unique();
            $table->string('classification_identifier')->nullable();
            $table->string('parent_identifier')->nullable();
            $table->string('negative_identifier')->nullable();
            $table->boolean('affects_gross_profit')->default(true);
            $table->string('ledger_type')->nullable();
            $table->string('voucher_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledger_groups');
    }
};
