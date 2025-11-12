<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function printMessage()
    {
        return "Hello World? - Übung 4";
    }
}
