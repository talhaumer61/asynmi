<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            // Core content
            $table->string('title');
            $table->string('href')->nullable(); // optional external/internal link
            $table->text('overview')->nullable();
            $table->longText('detail');

            // Media
            $table->string('image')->nullable();

            // Status & control
            $table->boolean('status')->default(1); // 1 = active, 0 = inactive

            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
