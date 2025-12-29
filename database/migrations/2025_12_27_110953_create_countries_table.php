<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('href')->unique();

            $table->string('country_code', 10)->nullable(); // USA, UK, PK
            $table->string('currency')->nullable();        // Dollar
            $table->string('currency_code', 10)->nullable(); // USD
            $table->string('currency_symbol', 10)->nullable(); // $

            $table->text('overview')->nullable();
            $table->longText('detail')->nullable();

            $table->string('image')->nullable();

            $table->boolean('status')->default(1);

            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
