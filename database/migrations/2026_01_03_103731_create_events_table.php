<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('href')->unique();

            $table->string('institution')->nullable();
            $table->string('representative')->nullable();

            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->string('location')->nullable();

            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();

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
        Schema::dropIfExists('events');
    }
};
