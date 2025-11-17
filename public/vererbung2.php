<?php
declare(strict_types=1);

// Schnittstelle
interface IVerhaltenLampe {
    public function an(); // no code, nur name!
}

abstract class Fahrzeug implements IVerhaltenLampe{

}

// Firma 1 die baute nur Autos
class PKW extends Fahrzeug {
public function an() { // code
    $this->anschalten();
}

public function anschalten() { // code

}
}

// Firma 2 die baute nur Autos
class LKW extends Fahrzeug {
    public function an() { // code

}
}


//
function beschreibeKlasse(IVerhaltenLampe $a){

     if ($a instanceof PKW) {
        var_dump($a->anschalten());
    } else {
        var_dump($a->an());
    }
}

// $i=new IVerhaltenLampe(); // interface keine instanz möglich!
// $fahrzeug  = new Fahrzeug(); // abstract class keine instanz möglich!
$pkw  = new PKW();
$lkw  = new LKW();

beschreibeKlasse($pkw);
beschreibeKlasse($lkw);