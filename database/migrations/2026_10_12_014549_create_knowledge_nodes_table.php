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
        Schema::create('knowledge_nodes', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('knowledge_id')
                ->constrained('knowledge')->cascadeOnDelete();
            $table->foreignUlid('parent_id')->nullable()
                ->constrained('knowledge_nodes')->cascadeOnDelete();
            $table->string('type');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_nodes');
    }
};
