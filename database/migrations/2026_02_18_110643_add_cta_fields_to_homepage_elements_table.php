<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_elements', function (Blueprint $table) {
            $table->text('footer_cta')->nullable()->after('counters');
            $table->string('btn_text')->nullable()->after('footer_cta');
            $table->string('url')->nullable()->after('btn_text');
        });
    }

    public function down(): void
    {
        Schema::table('homepage_elements', function (Blueprint $table) {
            $table->dropColumn(['footer_cta', 'btn_text', 'url']);
        });
    }
};