<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = [
      'order_id',
      'status_id',
      'admin_id'
    ];

    public function order(){
      return $this->belongsTo(Order::class, 'order_id');
    }

    public function status(){
      return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function admin(){
      return $this->belongsTo(User::class, 'user_id');
    }
}
