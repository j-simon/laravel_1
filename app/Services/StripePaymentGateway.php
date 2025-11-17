<?php

namespace App\Services;

use App\Contracts\PaymentGatewayContract;

class StripePaymentGateway implements PaymentGatewayContract
{
    public function charge($amount)
    {
        // Logic for proceeding payment through Stripe
        return "Charging {$amount} via Stripe.";
    }
}