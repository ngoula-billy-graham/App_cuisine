<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('formations', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->date('start_date')->nullable();
        $table->decimal('price', 8, 2)->default(0);
        $table->integer('places_available')->default(10); // C'est cette colonne qui manque !
        $table->string('status')->default('disponible');
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
