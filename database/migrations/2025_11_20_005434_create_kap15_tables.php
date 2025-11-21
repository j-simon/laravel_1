<?php // database/migrations/2025_01_01_000000_create_shop_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users_kap15', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('age')->nullable();
            $table->string('role')->default('user'); // für when() Beispiele
            $table->boolean('active')->default(true); // für intersect Beispiele
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('stock')->default(0);
            $table->integer('views')->default(0); // für orderBy Beispiele
            $table->foreignId('category_id')->nullable()->constrained();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users_kap15");
            $table->decimal('amount', 8, 2);
            $table->string('status')->default('pending');
            $table->date('order_date')->nullable();
            $table->timestamps();
        });
        
        Schema::create('contacts', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->string('email');
             $table->timestamps();
        });
        
         Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('users_kap15');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('posts');
    }
};