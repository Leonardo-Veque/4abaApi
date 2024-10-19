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
        Schema::create("pergunta_teste",function (Blueprint $table) {
            $table->id();
            $table->foreignId("pergunta_id")->constrained("perguntas");
            $table->foreignId("teste_id")->constrained("testes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("pergunta_teste");
    }
};
