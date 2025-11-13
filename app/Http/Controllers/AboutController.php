<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function showAbout()
    {

        /* 

    Den Firmennamen (z. B. »Tech Solutions Inc.«)

    Eine kurze Beschreibung der Firma (z. B. »Wir helfen Unternehmen, effizienter zu arbeiten.«)

    Eine Liste der angebotenen Dienstleistungen (z. B. »IT-Beratung«, »Softwareentwicklung«, »Cloud-Lösungen«).

    */
        $companyName = "»Tech Solutions Inc.«";
        $description = "»Wir helfen Unternehmen, effizienter zu arbeiten.«";
        $liste=[
        "»IT-Beratung«",
        "»Softwareentwicklung«",
        "»Cloud-Lösungen«"
        ];
        // return view("about",
        // [
        //     "companyName" => $companyName, 
        //     "description" => $description,
        //     "liste" => $liste
        // ]);

        //  return view("about")
        //  ->with("companyName",$companyName)
        //  ->with("description",$description)
        //  ->with("liste",$liste);

          return view("about",compact('companyName','description', 'liste'));
    }
}
