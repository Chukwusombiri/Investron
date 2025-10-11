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
        Schema::create('deposits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('amount');
            $table->boolean('isApproved')->default(0);
            $table->foreignUuid('user_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->string('plan');
            $table->foreignUuid('plan_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');            
            $table->string('wallet');            
            $table->string('address');
            $table->string('wallet_id')->nullable();
            $table->string('receipt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
