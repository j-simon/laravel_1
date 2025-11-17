<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Report extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Services\ReportService::class;
    }
}