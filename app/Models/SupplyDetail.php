<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'supply_id',
        'book_id',
        'price',
        'quantity',
  ];

    public function supply() {
        return $this->belongsTo(Supply::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
