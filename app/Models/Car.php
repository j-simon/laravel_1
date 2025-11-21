<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'wetter_koeln';

    protected $primaryKey = 'ts';
    public $incrementing = false;
    protected $keyType = 'timestamp ';
}
