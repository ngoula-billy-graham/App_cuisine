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
    Schema::create('inquiries', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('phone')->nullable();
        $table->string('service_type')->nullable();
        $table->date('preferred_date')->nullable(); // Nouveau champ
        $table->integer('number_of_people')->nullable(); // Nouveau champ
        $table->text('message');
        $table->string('status')->default('nouveau'); // nouveau, lu, traité
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
