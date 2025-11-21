<?php
// database/seeders/DatabaseSeeder.php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 50 User erstellen
        $users = User::factory(50)->create();

        // Bestellungen für Users
        $users->each(function ($user) {
            Order::factory(rand(0, 5))->create(['user_id' => $user->id]);
        });
        
        // Ein paar Produkte und Kategorien manuell für Tests
        DB::table('categories')->insert([
            ['name' => 'Electronics'],
            ['name' => 'Books'],
        ]);
        
        DB::table('products')->insert([
            ['name' => 'Laptop', 'price' => 999.99, 'views' => 100, 'category_id' => 1],
            ['name' => 'Smartphone', 'price' => 499.99, 'views' => 200, 'category_id' => 1],
            ['name' => 'Novel', 'price' => 19.99, 'views' => 50, 'category_id' => 2],
        ]);
        
        // Kontakte für Union Beispiele (ähnlich wie User)
        DB::table('contacts')->insert([
             ['name' => 'External Contact', 'email' => 'contact@example.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}