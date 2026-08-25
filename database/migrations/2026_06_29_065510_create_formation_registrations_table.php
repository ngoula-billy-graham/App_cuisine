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
    Schema::create('formation_registrations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('formation_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->string('email');
        $table->string('phone');
        $table->string('status')->default('en_attente'); // en_attente, confirmé, annulé
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_registrations');
    }
};
