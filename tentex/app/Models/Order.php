<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'user_name', 'email', 'user_phone', 'user_add', 'product_names', 'price', 'status', 'confirm'];
}
