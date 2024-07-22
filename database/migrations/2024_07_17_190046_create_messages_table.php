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

        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_1')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_2')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
        // Create messages table next
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversations_id')->constrained('conversations')->onDelete('cascade');
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->text('body');
            $table->timestamps();
        });

        // Add the last_message column to conversations table now that messages table exists

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('conversations');

    }
};
