<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Search and the template form use a tags column that no earlier migration created. */
    public function up(): void
    {
        if (! Schema::hasColumn('templates', 'tags')) {
            Schema::table('templates', function (Blueprint $table) {
                $table->text('tags')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('templates', 'tags')) {
            Schema::table('templates', function (Blueprint $table) {
                $table->dropColumn('tags');
            });
        }
    }
};
