<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class Service extends Model
{
    use HasFactory;

    public function order () {
      return $this->hasMany(Order::class, 'service_id');
    }
}
