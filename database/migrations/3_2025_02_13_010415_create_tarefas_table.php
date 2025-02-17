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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable(false);
            $table->unsignedBigInteger('responsavel_id')->nullable(true);
            $table->unsignedBigInteger('status_id')->nullable(true);
            $table->string('titulo', 200)->nullable(false);
            $table->text('descricao')->nullable(true);
            $table->date('prazo')->nullable(true);
            $table->timestamp('data_criacao')->useCurrent();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('responsavel_id')->references('id')->on('usuarios')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
