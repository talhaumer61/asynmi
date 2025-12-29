<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('href')->unique();

            $table->foreignId('country_id')
                  ->constrained('countries')
                  ->cascadeOnDelete();

            $table->string('city')->nullable();

            $table->string('ranking')->nullable();      // 120-240
            $table->string('tuition_fee')->nullable();  // 7000-20000
            $table->string('intake_months')->nullable(); // Jan,May,Sep
            $table->string('ielts_score')->nullable();   // 6.0 / 6.5

            $table->string('image')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
