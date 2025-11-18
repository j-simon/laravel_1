<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable()->change();
        });

        // seeden
        DB::insert(" INSERT INTO `projects` (`id`, `name`, `user_id`) VALUES
 (1, 'Unterricht', 1),
 (2, 'Übung', NULL);");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
