<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index(){
       $users = DB::select("SELECT * FROM users_ue11;"); 
       $users = [];
       dump($users);

       return view("users.users_ue11",compact("users"));
    }
}

