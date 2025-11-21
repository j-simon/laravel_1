<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // table products
    protected $table = 'products_ue14';

    // id : BigInt A_I PK
    protected $fillable = ['name',"price"]; // positiv Liste für zu speichernde Spalten
    // protected $guarded = ['name',"price"]; // positiv Liste für zu speichernde Spalten

    protected $dates="deleted_at";
}
