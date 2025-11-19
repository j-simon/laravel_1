<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabelle erstellen
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->default('DE');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 1000 User erstellen
        $vornamen = ['Max', 'Anna', 'Tom', 'Lisa', 'Paul', 'Sarah', 'Felix', 'Emma', 'Leon', 'Mia', 'Jonas', 'Sophie', 'Lukas', 'Laura', 'Tim', 'Julia', 'Jan', 'Marie', 'Nico', 'Lena'];
        $nachnamen = ['Müller', 'Schmidt', 'Schneider', 'Fischer', 'Weber', 'Meyer', 'Wagner', 'Becker', 'Schulz', 'Hoffmann', 'Koch', 'Richter', 'Klein', 'Wolf', 'Schröder', 'Neumann', 'Braun', 'Werner', 'Schwarz', 'Zimmermann'];
        $staedte = ['Düsseldorf', 'Köln', 'Essen', 'Dortmund', 'Duisburg', 'Bochum', 'Wuppertal', 'Bielefeld', 'Bonn', 'Münster'];
        
        $users = [];
        $password = Hash::make('password');
        
        for ($i = 1; $i <= 1000; $i++) {
            $vorname = $vornamen[array_rand($vornamen)];
            $nachname = $nachnamen[array_rand($nachnamen)];
            // $password = Hash::make($vorname);


            $users[] = [
                'name' => $vorname . ' ' . $nachname,
                'email' => 'user' . $i . '@example.com',
                'password' => $password,
                'username' => strtolower($vorname . $nachname) . $i,
                'phone' => '0211-' . rand(1000000, 9999999),
                'birth_date' => date('Y-m-d', strtotime('-' . rand(18, 70) . ' years')),
                'city' => $staedte[array_rand($staedte)],
                'country' => 'DE',
                'is_active' => rand(0, 10) > 1, // 90% aktiv
                'created_at' => now(),
                'updated_at' => now(),
            ];
            
            // Alle 100 User einfügen (für bessere Performance)
            if ($i % 100 == 0) {
                DB::table('users')->insert($users);
                $users = [];
            }
        }
        
        // Restliche User einfügen falls welche übrig sind
        if (!empty($users)) {
            DB::table('users')->insert($users);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};