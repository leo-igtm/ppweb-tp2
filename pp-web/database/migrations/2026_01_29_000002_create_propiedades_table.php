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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->enum('tipo', ['casa', 'departamento', 'terreno', 'local', 'oficina']);
            $table->enum('operacion', ['venta', 'alquiler']);
            $table->decimal('precio', 12, 2);
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('provincia');
            $table->integer('habitaciones')->nullable();
            $table->integer('banos')->nullable();
            $table->decimal('superficie', 10, 2);
            $table->boolean('disponible')->default(true);
            $table->string('imagen')->nullable();
            $table->foreignId('agente_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
