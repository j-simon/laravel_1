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
        Schema::create('products_ue14', function (Blueprint $table) {
            $table->id(); // BigInt A_I PK
            $table->string("name");
            $table->decimal("price",10,2); //12345678.90
            $table->timestamps(); // created_at_ updated_at timestamp , ohne auto update
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_ue14');
    }
};
