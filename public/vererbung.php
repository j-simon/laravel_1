<?php
declare(strict_types=1);

interface I
{
    public function pay(int $betrag);
}

class Payment implements I{
    public function pay(int $betrag) {}
}

class ApplePay extends Payment 
{
    public function pay(int $betrag) {}
}

class GooglePay extends Payment
{
    public function pay(int $betrag) {}
}


function bezahle(Payment $payObject, int $betrag)
{

    $payObject->pay($betrag);
}

bezahle(new ApplePay(), 100);
bezahle(new GooglePay(), 100);
