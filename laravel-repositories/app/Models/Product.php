<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'products'; // quando a tabela já existe no banco
    protected $fillable = ['name', 'price', 'description', 'image'];
}
