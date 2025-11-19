<?php

use App\Facades\PaymentGatewayFacade;
use App\Facades\Report;
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




// http://localhost/impressum_view
Route::get('/impressum_view', function () {
    $inhalt = "Willkommen";
    return view('impressum', ['inhalt' => $inhalt]);
});





// http://localhost/datenschutz_view
Route::get('/datenschutz_view', function () {

    return view('datenschutz');
});






// http://localhost/kontakt_seite
Route::get('/kontakt_seite', function () {
    //$inhalt="Willkommen";
    return view('kontakt'); //['inhalt' => $inhalt]);
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
    return $firstName . " " . $lastName;
});


// // http://localhost/alte_url
Route::get("alte_url", function () {





    return redirect('neue_seite');
});

// http://localhost/neue_seite
Route::get("neue_seite", function () {
    return "neue Seite";
});

use  App\Http\Controllers\EventController;
use App\Http\Controllers\TestInvokableController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

// http://localhost/event_ansehen
Route::get('/event_ansehen', [EventController::class, 'tueEtwas']); // customn action

// http://localhost/event_ansehen/2/2025
// http://localhost/event_ansehen/5/2030
Route::get('/event_ansehen/{nr}/{jahr}', [EventController::class, 'zeigeEvent']);

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
Route::get('article2', [Article2Controller::class, "hallo"]);

Route::get('invokeTest', TestInvokableController::class);


// Übung 4
use App\Http\Controllers\TestController;

Route::get("helloworld", [TestController::class, 'printMessage']);

// Übung 5
use App\Http\Controllers\BlogPostController;


Route::resource("blogposts", BlogPostController::class);

// Kapitel 6 Request und Response

// curl -X POST http://localhost/test_request_route

use Illuminate\Http\Request;

Route::post("/test_request_route", function (Request $request) {
    // var_dump($request->all()); // für GET , POST ,....
    // var_dump($request->input("nachname")); // für GET , POST ,....

    // var_dump($request->only("nachname")); // nur für GET

    // var_dump($request->has('vname'));

    // var_dump($request->query("vname","Default")); // für GET

    // var_dump($request->filled("vname")); // für GET prüft auf Inhalt eines vorhandnen Feldes

    // var_dump($request->json()->all());
    //  var_dump($request->cookie());
    //  $browser = $request->header('User-Agent');
    //  var_dump($browser);
    // Validierung , Regelprüfung , leeres Feld nicht , maximal 20 Buchstaben
    // if else

    // $request->validate(
    //     [
    //     'nachname' => 'required | max:2',
    //     // 'email' => 'required | email',
    //     ]
    // );
    // Regeln ok, code läuft weiter
    // Regel nicht OK , dann Redirect auf sich selbst
    if (!$request->filled("vname"))
        return redirect()->back();
    else
        // $request->input();
        // var_dump($_REQUEST['nachname']);
        //var_dump($_POST); // ['vname'] ="Jens"
        return "ok\n";
})->withoutMiddleware([VerifyCsrfToken::class]);


Route::get("/antwort2", function () {

    $data = [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
    ];

    // return response("OK",234);//->json($data);
    // 
    return response("Hello, World!")
        ->withHeaders([
            'Language' => 'englisch'
        ]);
});

// http://localhost/download
Route::get("/download", function () {

    $filePath = storage_path('file/test.pdf');
    return response()->download($filePath);
});




// http://localhost/stream
Route::get('/stream', function () {
    return response()->stream(function () {
        for ($i = 1; $i <= 5; $i++) {
            echo "Schritt {$i} abgeschlossen<br>";
            ob_flush();
            flush();
            sleep(1); // simuliert Arbeit
        }
        echo "Fertig!";
    }, 200, [
        'Content-Type' => 'text/html',
        'Cache-Control' => 'no-cache',
    ]);
});

use Illuminate\Support\Facades\Response;
// http://localhost/audio-stream
Route::get('/audio-stream', function () {
    $audioFile = storage_path('audio_streams/song.mp3'); // 6 MB

    if (!file_exists($audioFile)) {
        abort(404);
    }

    $fileSize = filesize($audioFile);
    $mime = mime_content_type($audioFile);

    return Response::stream(function () use ($audioFile) {
        $handle = fopen($audioFile, 'rb');
        while (!feof($handle)) {
            echo fread($handle, 8192); // 8 KB chunks
            ob_flush();
            flush();
        }
        fclose($handle);
    }, 200, [
        'Content-Type' => $mime,
        'Content-Length' => $fileSize,
        'Accept-Ranges' => 'bytes',
        'Cache-Control' => 'public, max-age=3600',
    ]);
});

// http://localhost/zuGoogle
Route::get("/zuGoogle", function () {
    // return response()->redirectTo("https://google.de");
    return redirect("https://google.de");
});

// name=Jens&email=jens.simon@gmx.net
// curl -X -v POST http://localhost/submitForm 
// curl -X -v POST http://localhost/submitForm -d "email=jens.simon@gmx.net"
// curl -X -v POST http://localhost/submitForm -d "name=Jens" -d "email=jens.simon"
// curl -X -v POST http://localhost/submitForm -d "name=Jens" -d "email=jens.simon@gmx.net"


use App\Http\Controllers\FormController;
// http://localhost/submitForm
Route::post("/submitForm", [FormController::class, "submitForm"])
    ->withoutMiddleware([VerifyCsrfToken::class]);

Route::get("/thank-you", function () {

    return "Danke!";
});


use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\DB;

//  http://localhost/about
Route::get("/about", [AboutController::class, "showAbout"]);

//  http://localhost/bladeTest
Route::get("/bladeTest", function (Request $request) {
    $text2 = $request->input("text2");
    $text = "<div>hallo Welt!</div><script>alert('gehackt')</script>";
    // $text2="<div>hallo Welt2!</div><script>alert('gehackt')</script>";
    return view("bladetest", compact("text", "text2"));
});


//  http://localhost/home
Route::get("/home", function () {
    return view("home");
});


//  http://localhost/contact
Route::get("/contact", function () {
    return view("contact");
});




// uebung 8

use App\Http\Controllers\ProfileController;
use App\Http\Requests\StoreUserRequest;


// http://localhost/profile
Route::get("profile", [ProfileController::class, "showProfile"]);
// Route::get("profile", ProfileController@showProfile");




// Kapitel 9 - Formular
// http://localhost/user/form // Ansicht des Formular muss GET Route
Route::get('/user/form', function (Request $request) {
    dump($request);
    return view('user_form');
})->name('user.form');

Route::post(
    '/user/store',
    function (StoreUserRequest $request) {

        // Daten Vorverarbeitung, Request auswerten, evtl. Inhaltsfehler per
        // Validierung finden
        //     $wert = $request->validate([
        //         'name' => 'required|string|max:255',
        //         'email' => 'required|email'
        //     ], [
        //     'name.required' => 'Gib bitte deinen Namen ein.',
        //     'name.string' => 'The name must be a valid text string.',
        //     'name.max' => 'The name may not be greater than 255 characters.',
        //     'email.required' => 'We need your email address to proceed.',
        //     'email.email' => 'Please provide a valid email address.'
        // ]); // Daten des Formulars speichern muss POST Route

        // $wert ist ein Array
        // public function validate($array){

        //     if () return redirect()->back();// falsch
        //     else  return array // richtig
        // }


        // speichern
        $name = $request->input("name");
        $email = $request->input("email");
        return "speichern name:" . htmlentities($name, ENT_QUOTES | ENT_HTML5, 'UTF-8') . " und email:$email";
    }
)->name('user.store');


//  http://localhost/sqlInjection
Route::get("/sqlInjection", function () {

    $email = "jens.simon@gmx.net"; // Simulierte Eingabe aus Kontaktformular
    $users = DB::select("SELECT * FROM users WHERE email = '$email'");
    var_dump($users);

    // Vulnerable: direkte Konkatenation

    $email = "jens.simon@gmx.net' OR 1=1;delete from users; -- "; //"jens';select * from users;";
    $users = DB::select("SELECT * FROM users WHERE email = '$email'");
    var_dump($users);
});




// http://localhost/eigeneServiceKlasseBenutzen
use App\Services\PaymentGateway;

Route::get("/eigeneServiceKlasseBenutzen", function () {
    // die (PaymentGateway::class);

    // eigene Variante
    $pg1 = new PaymentGateway();
    // var_dump($pg1);

    // eigene Variante
    $pg2 = new PaymentGateway();
    // var_dump($pg2);

    // var_dump( $pg1 === $pg2); // false // false nicht seingleton




    // Laravel Service Container Variante
    $pg1 = app()->make(PaymentGateway::class); // register wo bind war -> new PaymentGateway();
    // echo $pg1->process(); // Output: "Payment processed"
    $pg2 = app()->make(PaymentGateway::class); // register wo bind war -> new PaymentGateway();
    // echo $pg2->process(); // Output: "Payment processed"

    // var_dump( $pg1 === $pg2); // false // false nicht seingleton

    echo PaymentGatewayFacade::process();
    echo Report::generateSalesReport();
});

use App\Services\NotificationService;

// http://localhost/testNotification
Route::get("testNotification", function () {

    $notificationService = app(NotificationService::class);
    echo $notificationService->sendNotification('jens.simon@gmx.net', 'Welcome!', 'Thanks for joining our platform.');
});

// http://localhost/raw_sql
Route::get("raw_sql", function () {
    $users = DB::select("SELECT * FROM users;");
    // var_dump($users);
    dump($users);

    return "fertig!";
});


// uebung 10
use App\Facades\MailServiceFacade;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

//  http://localhost/send-email-ue10
Route::get('/send-email-ue10', function () {
    return MailServiceFacade::send('Welcome to the Laravel course!');
});

// use Illuminate\Support\Facades\DB;
// http://localhost/test_debugbar_raw_sql
Route::get('/test_debugbar_raw_sql', function () {

    $erg = DB::insert('INSERT IGNORE INTO users (name, email) VALUES (?, ?)', ['John Doe', 'john@example.com']);
    dump($erg);

    // ohne parameter binding ! Vorsicht möglichkeit SQL-Injection
    $users = DB::select('SELECT * FROM users WHERE id=1');
    dump($users);

    // mit parameter binding (fragezeichen)  SQL-Injection fest!
    $users = DB::select('SELECT * FROM users WHERE id=?', [2]);
    dump($users);

    // mit parameter binding (fragezeichen) SQL-Injection fest!
    $users = DB::select('SELECT * FROM users WHERE id=:id', ['id' => 3]);
    dump($users);

    $ret = DB::statement('ALTER TABLE `users` DROP `remember_token`;');
    dump($ret);

    // var_dump($users);
    // echo " ";
    // print("$users");
    // print_r("$users");
    // die($users);
    // exit($users);
    //return "hallo"; // response 
    // var_dump($users);
    // dump($users);
    // dd($users); // dump & die
    // echo "das hier kommt nicht mehr";
    // ddd();
});


// use Illuminate\Support\Facades\DB;
// http://localhost/test_join
Route::get('/test_join', function () {

    $users = DB::select('SELECT users.id as uid,users.name as uname ,projects.id ,projects.name,projects.user_id FROM users JOIN projects ON users.id = projects.user_id;');
    dd($users);

    /*
SELECT *
FROM users JOIN projects
ON users.id = projects.user_id;


*/
});

// uebung 11
// http://localhost/uebung_11
Route::get('/uebung_11', [UserController::class, "index"]);

// uebung 11
// index , Übersicht
// http://localhost/projects

// create - formular anzeigen
// http://localhost/projects/create
Route::resource('/projects', ProjectController::class);


use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\DB;
// http://localhost/kap15_collection_beispiel
Route::get("kap15_collection_beispiel", function () {


    // Create a collection from an array
    // $users = [
    //     ['name' => 'Max Mustermann', 'email' => 'max@example.com'],
    //     ['name' => 'Anna Smith', 'email' => 'anna@web.com'],
    // ];
    // dump($users);

    // $users = collect([
    //     ['name' => 'Max Mustermann', 'email' => 'max@example.com'],
    //     ['name' => 'Anna Smith', 'email' => 'anna@web.com'],
    // ]);
    // // Output the collection
    // var_dump($users);

    /*
    object(Illuminate\Support\Collection)#1257 (2) {
  ["items":protected]=&gt;
  array(2) {
    [0]=&gt;
    array(2) {
      ["name"]=&gt;
      string(14) "Max Mustermann"
      ["email"]=&gt;
      string(15) "max@example.com"
    }
    [1]=&gt;
    array(2) {
      ["name"]=&gt;
      string(10) "Anna Smith"
      ["email"]=&gt;
      string(12) "anna@web.com"
    }
  }
  ["escapeWhenCastingToString":protected]=&gt;
  bool(false)
}
  */

    // // Filter users with a specific email domain
    // $filteredUsers = $users->filter(function ($user) {
    //     return str_starts_with($user['name'], 'Anna');
    // });

    // // Output the filtered collection
    // dd($filteredUsers);

    //     $emails = $users->pluck('email');

    // // Output the list of emails
    // dd($emails);
    // ''
    // $updatedUsers = $users->map(function ($user) {
    //     $user['status'] = 'active';
    //     return $user;
    // });

    // // Output the updated collection
    // dd($updatedUsers);''



    // Select all columns from the users table
    // $users = DB::table('e1users_u1');
    // dump($users);

    // $users=$users->get();
    // // var_dump($users);
        // dump($users);
    $users = DB::table('users')
        ->select('name as N', 'email AS E')
        ->where( "id",">",1 )
        ->where( "name","LIKE","%i%" )
        ->get();
    dump($users);

    var_dump(now());

    return "OK!";
});
