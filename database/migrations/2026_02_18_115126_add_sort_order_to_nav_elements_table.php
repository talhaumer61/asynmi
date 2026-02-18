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
        Schema::table('nav_elements', function (Blueprint $table) {
            // 'link' = individual menu item, 'section' = entire footer column
            $table->string('type')->default('link')->after('location');
            $table->integer('sort_order')->default(0)->after('is_visible');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nav_elements', function (Blueprint $table) {
            //
        });
    }
};
