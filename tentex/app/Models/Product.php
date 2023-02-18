<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'product_name', 'product_type', 'product_desc','product_price','discount','product_size','product_quantity','tag','stock','review', 'image', 'sub_id', 'status'];
}
