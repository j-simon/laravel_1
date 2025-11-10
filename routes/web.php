<?php

use Illuminate\Support\Facades\Route;



// Eine Website und deren Adresse 
// / 
// Startseite
// http://localhost/
Route::get('/', function () {
    return view('welcome');
});








// GET-Routen können mit dem Browser über die Adresse getestet werden!
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

// für nicht GET-Routen kann man in
// vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/VerifyCsrfToken.php
// folgenden Eintrag pflegen:
// der vendor Ordner wird nicht auf git publiziert!!
//....
/* protected $except = [
       "/anfrage",
       "/put"
    ]; */
//....

//Damit sind nicht GET-Routen überhaupt testbar , als 
// Testwerkzeug kann man Postman oder andere Request-Tools einsetzen
Route::post("/anfrage", function () {
    return "post anfrage erhalten!";
});

Route::put("/put", function () {
    return "put anfrage erhalten!";
});


Route::any("/any", function () {
    return "any anfrage erhalten!";
});


// function  () {
// }
/*
// Die $uri ist der Pfadanteil der Gesamt-URI(L) 
// $callback ist im einfachsten Fall ein Closure hier anonyme Function mit Rückgabe-Konzept
Route::method($uri, $callback);
*/

// Parametrisierende Routen machen Teil(e) der uri variabel 
// Damit kann man Massen Routen abarbeiten wie in Shop-Plattformen verwendet
Route::get("/p/{id}", function ($id) {
    return $id;
});


// otto.de
//  http://localhost/p/xiaomi-e-scooter-electric-scooter-5-350-w-20-km-h-electric-scooter-mit-strassenzulassung-bis-zu-60-km-reichweite-C1960713506/#
//  http://localhost/p/privileg-mikrowelle-64111926-mikrowelle-20-l-mit-5-leistungsstufen-silber-801844284/#

// ebay.de
// http://localhost/itm/388576931825
// http://loclahost/itm/167784245516
Route::get("/produkt/{nr}", function ($nr) {
    return "<h2>Produktseite für: ".$nr."</h2>";
})->name("produkt_link");

// http://localhost/allitems
Route::get("/allitems", function () {
    return "<h1>Übersicht</h1>
            <a href='".route('produkt_link', ['nr' => 123])."'>123</a><br>
            <a href='".route('produkt_link', ['nr' => 'mikrowelle'])."'>Mikrowelle</a><br>
            ";
});

// ./vendor/bin/sail php artisan route:list -vvv




