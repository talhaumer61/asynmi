<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);

            $table->string('email1')->nullable();
            $table->string('email2')->nullable();

            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();

            // Multiple addresses stored as JSON
            // [{ "city": "Lahore", "address": "ABC Road" }]
            $table->json('addresses')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
