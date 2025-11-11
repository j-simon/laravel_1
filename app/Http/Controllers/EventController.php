<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    // customn actions - selbsstdefinierte uund benannte Methode
    public function tueEtwas(){
        return "ich tueEtwas";
    }

     public function zeigeEvent($nr, $jahr){
        return "du siehst den event: ".$nr." ".$jahr;
    }

     public function greetUser($name)
    {
        return "Hello, " . $name . "!";
    }
}
