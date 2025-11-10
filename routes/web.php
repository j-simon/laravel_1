<?php

use Illuminate\Support\Facades\Route;



// Eine Website und deren Adresse 
// / 
// Startseite
// http://localhost/
Route::get('/', function () {
    return view('welcome');
});









// http://localhost/impressum
Route::get("/impressum", function () {
   return "<!DOCTYPE html>
   <html>
   <head>
   </head>
   <body>
   <div style='color:red'>Impressumsseite</div>
   </body>
   </html>
   ";
});


Route::post("/anfrage", function(){
    return "post anfrage erhalten!";
});

Route::put("/put", function(){
    return "put anfrage erhalten!";
});


Route::any("/any", function(){
    return "any anfrage erhalten!";
});
// function hallo () {
// }
/*
Route::method($uri, $callback);
*/
Route::get("/p/{id}", function($id){
    return $id;
});

//  http://localhost/p/xiaomi-e-scooter-electric-scooter-5-350-w-20-km-h-electric-scooter-mit-strassenzulassung-bis-zu-60-km-reichweite-C1960713506/#
//  http://localhost/p/privileg-mikrowelle-64111926-mikrowelle-20-l-mit-5-leistungsstufen-silber-801844284/#

// http://localhost/itm/388576931825
// http://loclahost/itm/167784245516
Route::get("/itm/{nr}", function($nr){
    return $nr;
});
