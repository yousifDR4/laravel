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
        Schema::table('conversations', function (Blueprint $table) {
        $table->foreignId('last_message')->nullable()->constrained('messages');
        });

        Schema::create('conversation_participants', function (Blueprint $table) {
            $table->foreignId("conversations_id")->index();
            $table->foreignId("user_id")->index();
            $table->foreign("user_id")->on("users")->references("id");
            $table->foreign("conversations_id")->on("conversations")->references("id");
            $table->primary(["conversations_id", "user_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation_participants');

    }
};
