<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('gestionop', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->string('libelle');
            $table->string('elaboration');
            $table->string('type');
            $table->double('montant');;
            $table->boolean('regellement')->default(false); 
            $table->timestamps();
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('gestionop');
    }
};
