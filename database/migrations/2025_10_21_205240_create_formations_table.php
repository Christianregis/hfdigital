<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('duration')->nullable();
            $table->integer('nbreModule');
            $table->string('imageFormation')->nullable();
            $table->string('aproposFormation')->nullable();
            $table->string('imageApropos')->nullable();
            $table->string('apprentissage1')->nullable();
            $table->string('apprentissage2')->nullable();
            $table->string('apprentissage3')->nullable();
            $table->string('apprentissage4')->nullable();
            $table->string('codeAccess')->unique();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
