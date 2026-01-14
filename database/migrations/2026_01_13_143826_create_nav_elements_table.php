<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nav_elements', function (Blueprint $table) {
            $table->id();

            $table->string('location'); // e.g. header, footer
            $table->string('name');     // Menu label
            $table->boolean('is_visible')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nav_elements');
    }
};
