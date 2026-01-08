<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('addresses');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('linkedin')->nullable()->after('instagram');
            $table->string('twitter')->nullable()->after('linkedin');
        });
    }

    public function down(): void
    {
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->dropColumn([
                'facebook',
                'instagram',
                'linkedin',
                'twitter',
            ]);
        });
    }
};
