<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_description'
  ];
}
