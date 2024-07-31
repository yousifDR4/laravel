<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId("last_message")->nullable()->constrained('messages');
            $table->string('name');
            $table->text('description');
            $table->foreignId('owner_id');
            $table->foreign('owner_id')->on('users')->references('id');
            $table->timestamps();
        });
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('group_id')->index()->nullable()->constrained('groups')->onDelete('cascade');
        });
        Schema::create('group_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->foreignId('group_id')->index();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('group_id')->on('groups')->references('id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
        Schema::dropIfExists('group_users');
    }
};
