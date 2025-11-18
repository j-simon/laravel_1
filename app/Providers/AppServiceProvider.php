<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayContract;
use App\Services\MailService;
use App\Services\NotificationService;
use App\Services\PaymentGateway;
use App\Services\ReportService;
use App\Services\StripePaymentGateway;
use Illuminate\Support\ServiceProvider;
use App\Contracts\MailServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Registrierung einer eigenen Klasse die im app/Services Ordner
        $this->app->bind(PaymentGateway::class, function () {
            return new PaymentGateway();
        });//,true);

         // Registrierung einer eigenen Klasse die im app/Services Ordner
        $this->app->singleton(ReportService::class, function () {
            return new ReportService();
        });//,true);

       $this->app->singleton(NotificationService::class, function ($app) {
            return new NotificationService($app->make(\Illuminate\Contracts\Mail\Mailer::class));
        });

        $this->app->bind(MailServiceInterface::class, MailService::class);

       // wlakthrough
        $this->app->bind(PaymentGatewayContract::class, StripePaymentGateway::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Sharing global data across all views
        view()->share('appName', 'Tolle Software - meine App');
    }
}
