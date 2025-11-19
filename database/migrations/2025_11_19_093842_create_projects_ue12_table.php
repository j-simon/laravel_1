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
        Schema::create('projects_ue12', function (Blueprint $table) {
            $table->id(); // BigInt A_I PK
            //  name, description, start_date, end_date und status
            $table->string("name");
            $table->text("description");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("status")->default("pending");
            $table->timestamps(); // 2 Felder created_at updated_at TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
