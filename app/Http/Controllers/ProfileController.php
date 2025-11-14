<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function showProfile()
    {

        // Daten
        $name = "Jens Simon";
        $alter = 42;
        $bio = "Es war einmal ...";
        $hobbies = ["PHP", "MYSQL"];



        // View mit Datenübergabe
        return view("profile",compact("name","alter","bio","hobbies"));
    }
}
