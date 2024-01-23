<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_category_id',
        'title',
        'author',
        'description',
        'publisher',
        'year',
        'isbn',
        'pages',
        'language',
        'weight',
        'dimensions',
        'price',
        'quantity',
        'image',
  ];

  public function bookCategory() {
    return $this->belongsTo(BookCategory::class);
  }

}
