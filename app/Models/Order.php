<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OrderHistory;
use App\Models\OrderStatus;
use App\Models\Service;
use App\Models\Subservice;
use App\Models\User;

class Order extends Model
{ 
    use HasFactory;

    protected $fillable = [
      'code',
      'service_id',
      'subservice_id',
      'status_id',
      'location_lat',
      'location_lng',
      'date',
      'time',
      'description',
      'user_id',
      'phone',
      'is_homevisit'
    ];

    public function history(){
      return $this->hasMany(OrderHistory::class, 'order_id');
    }
    
    public function service () {
      return $this->belongsTo(Service::class, 'service_id');
    }
    
    public function subservice () {
      return $this->belongsTo(Subservice::class, 'subservice_id');
    }
    
    public function user () {
      return $this->belongsTo(User::class, 'user_id');
    }
}
