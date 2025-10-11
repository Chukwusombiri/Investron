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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('image');
            $table->date('published_at')->change();            
        });    
        
        Schema::table('content_blocks', function(Blueprint $table){
            $table->enum('type', ['sub-topic','paragraph', 'image', 'ordered-list','unordered-list', 'table'])->change();
        });

        Schema::table('topics',function(Blueprint $table){
            $table->string('slug')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {                             
            
        });
    }
};
