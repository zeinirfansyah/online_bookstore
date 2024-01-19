<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'description',
        'image',
        'price',
        'category',
        'publisher',
        'year',
        'isbn',
        'pages',
        'language',
        'weight',
        'dimensions',
        'quantity'
  ];

}
