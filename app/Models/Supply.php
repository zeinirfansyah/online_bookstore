<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;
    protected $fillable = [
      'supplier_id',
      'supply_date',
  ];

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
