<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'sub_name', 'sub_type', 'sub_desc', 'image', 'cat_id', 'status'];
}
