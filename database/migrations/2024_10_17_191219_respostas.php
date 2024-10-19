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
        Schema::create("respostas",function (Blueprint $table) {
            $table->id();
            $table->foreignId("cliente_id")->constrained("clientes");
            $table->foreignId("teste_id")->constrained("testes");
            $table->foreignId("pergunta_id")->constrained("perguntas");
            $table->string("resposta");
            $table->date("data");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("respostas");
    }
};
