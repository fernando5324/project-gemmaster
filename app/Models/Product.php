<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required',
		'price' => 'required',
		'stock' => 'required',
    'category_id' => 'required',
    ];

    protected $fillable = ['name','price','stock','category_id'];

}
