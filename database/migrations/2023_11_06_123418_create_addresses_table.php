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
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->enum('type', ['private', 'business','other']);
            $table->string('street');
            $table->string('number');
            $table->string('zip_code');
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country');
            $table->text('remarks')->nullable();
            $table->boolean('main')->default(false)->nullable();
            $table->timestamps();

            $table->foreignUuid('profile_id')->constrained('profiles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
