<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Order;
use App\Models\OrderHistory;

class ClientOrderTable extends Component
{
  public $code = '';
  public function render(){
    $orders = Order::where('user_id', \Auth::id())
    ->where('code', 'like', '%'.$this->code.'%')
    ->orderByDesc('id')->get();
    return view('livewire.client-order-table', compact('orders'));
  }
}
