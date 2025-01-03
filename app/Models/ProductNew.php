<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductNew extends Model
{
    use HasFactory;

    protected $fillable = [
        'productname',
        'quantity',
        'price',
        'condition',
        'description',
    ];
}
