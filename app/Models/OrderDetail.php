<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
  ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
