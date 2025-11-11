<?php

use App\Http\Controllers\Article2Controller;
use App\Http\Controllers\ArticleController;
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

// Damit sind nicht GET-Routen überhaupt testbar , als 
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
    return "<h2>Produktseite für: " . $nr . "</h2>";
})->name("produkt_link");

// http://localhost/allitems
Route::get("/allitems", function () {
    return "<h1>Übersicht</h1>
            <a href='" . route('produkt_link', ['nr' => 123]) . "'>123</a><br>
            <a href='" . route('produkt_link', ['nr' => 'mikrowelle']) . "'>Mikrowelle</a><br>
            ";
});

// ./vendor/bin/sail php artisan route:list -vvv



// http://../p/Jens/Simon
Route::get("/p/{vorname}/{nachname}", function ($vorname, $nachname) {
    return $vorname . " " . $nachname;
});

// use App\Http\Controllers\UserController;
// Route::get('/user/profile', [UserController::class, 'show'])->name('profile');

// return redirect()->route('profile');




// SEO search engine optimization
// xyz.de/?id=1
// xyz.de/?id=2
// xyz.de/?id=3

// xyz.de/kühlschrank
// xyz.de/samsung fernseher
// xyz.de/lenovo thinkpad klhjdffkldg gfd hdfö hdfölk dflö lkdfhldföhg lkfdglkdfgkl


// Übung 2
// http://localhost/helloworld
Route::get("helloworld",  function () {
    return "Hello World!";
});

// Übung 3
// http://localhost/greeting/Jens/Simon
Route::get("/greeting/{firstName}/{lastName}", function ($firstName, $lastName) {
    return $firstName. " " . $lastName;
});


// // http://localhost/alte_url
Route::get("alte_url",function(){





    return redirect('neue_seite');
});

// http://localhost/neue_seite
Route::get("neue_seite",function(){
    return "neue Seite";
});
use  App\Http\Controllers\EventController;
use App\Http\Controllers\TestInvokableController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

// http://localhost/event_ansehen
Route::get( '/event_ansehen', [EventController::class, 'tueEtwas']); // customn action
 
// http://localhost/event_ansehen/2/2025
// http://localhost/event_ansehen/5/2030
Route::get( '/event_ansehen/{nr}/{jahr}', [EventController::class, 'zeigeEvent']);

//[UserController::class, 'show']
// $eventObject=new App\Http\Controllers\EventController();
// $eventObject->tueEtwas();


// 2. Resource-Contoller
// http://localhost/articles
Route::resource('articles', ArticleController::class);


/* REST API - Routing
1  GET|HEAD        articles .................................................... articles.index › ArticleController@index
2  POST            articles .................................................... articles.store › ArticleController@store
3  GET|HEAD        articles/create ........................................... articles.create › ArticleController@create
4  GET|HEAD        articles/{article} ............................................ articles.show › ArticleController@show
5  PUT|PATCH       articles/{article} ........................................ articles.update › ArticleController@update
6  DELETE          articles/{article} ...................................... articles.destroy › ArticleController@destroy
7  GET|HEAD        articles/{article}/edit ....................................... articles.edit › ArticleController@edit
  */

// CRUD

// Create
// Read
// Update
// Delete


// Beide gehen auf 
;
Route::resource('articles2', Article2Controller::class)->except("show")->withoutMiddleware([VerifyCsrfToken::class]);
Route::get('article2', [Article2Controller::class,"hallo"]);

Route::get('invokeTest',TestInvokableController::class);