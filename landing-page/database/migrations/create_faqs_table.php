<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('pergunta');
            $table->string('resposta');
            $table->integer('status');
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
