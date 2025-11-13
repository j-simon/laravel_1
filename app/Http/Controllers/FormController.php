<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* 

Erstelle den FormController

Baue einen Controller mit einer Methode submitForm(), 
die das Request-Objekt empfängt und verarbeitet.

*/
class FormController extends Controller
{
  //
   public function submitForm(Request $request)
    {
        echo "start";
        // var_dump($request->all());

        $name=$request->input("name");
        $email=$request->input("email");

        echo $name;
        echo $email;

        if( !$request->has("name") || !$request->input("email")){
            //    return response("Fehler in den Daten", 400);

               return response()->json([
                'error' => 'Both name and email fields are required.'
            ], 400);
        }

        // Validation of e-mail address
        $email = $request->input('email');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withErrors(['email' => 'The email address is not valid.']);
        }

        // Success message and redirect
        return redirect('/thank-you')
            ->with('message', 'Form submitted successfully!')
            ->setStatusCode(200);
        
    }
}