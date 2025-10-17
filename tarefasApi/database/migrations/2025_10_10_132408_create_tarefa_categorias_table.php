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
        Schema::create('tarefa_categorias', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('idtarefa');
            $table->unsignedBigInteger('idcategoria');
            $table->foreign('idtarefa')->references('idtarefa')
                ->on('tarefas')->onDelete('no action')->onUpdate('no action');
            $table->foreign('idcategoria')->references('idcategoria')
                ->on('categorias')->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
            $table->primary(['idtarefa', 'idcategoria']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa_categorias');
    }
};
