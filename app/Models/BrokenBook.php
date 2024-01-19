<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrokenBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'supply_id',
        'quantity',
  ];

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function supply() {
        return $this->belongsTo(Supply::class);
    }
}
