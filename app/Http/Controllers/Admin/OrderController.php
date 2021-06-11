<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderHistory;

class OrderController extends Controller
{
  public function index(Request $request){
    $status = $request->status ?? 1;
    $orders = Order::where('status_id', $status)->get();

    return view('pages.admin.pesanan', compact('orders'));
  }

  public function setStatus($code, Request $request){
    $order = Order::where('code', $code)->firstOrFail();

    $update = $order->update([
      'status_id' => $request->status_id
    ]);

    $history = OrderHistory::create([
      'order_id' => $order->id,
      'status_id' => $request->status_id,
      'admin_id' => Auth::id()
    ]);

    if(
      $update && $history
    ){
      return back()->with('success', 'Berhasil diupdate');
    }else{
      return back()->with('gagal', 'Gagal diupdate');
    }
  }

  public function edit($code){
    $order = Order::where('code', $code)->firstOrFail();

    return view('pages.admin.pesanan-edit', compact('order'));
  }

  public function update($code, Request $request){
    $order = Order::where('code', $code)->firstOrFail();

    $request->validate([
      'date' => 'required',
    ]);

    $update = $order->update([
      'date' => $request->date,
      'time' => $request->time ?? $order->time,
      'status_id' => 2
    ]);

    if($update){
      return back()->with('success', 'Jadwal berhasil diubah');
    }else{
      return back()->with('error', 'Jadwal berhasil diubah');
    }
  }
}
