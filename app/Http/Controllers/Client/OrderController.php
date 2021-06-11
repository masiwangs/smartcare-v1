<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\Subservice;

class OrderController extends Controller
{
  public function index(){
    return view('pages.client.pesanan');
  }

  public function show($code){
    $order = Order::where('code', $code)->firstOrFail();
    return view('pages.client.pesanan-detail', compact('order'));
  }

  public function cancel($code){
    $order = Order::where('code', $code)->firstOrFail();
    return view('pages.client.pesanan-batal', compact('order'));
  }

  public function cancelPost($code){
    $order = Order::where('code', $code)->firstOrFail();
    $order->update([
      'status_id' => 6
    ]);
    $orderHistory = OrderHistory::create([
      'order_id' => $order->id,
      'status_id' => 6
    ]);
    if($order && $orderHistory){
      return redirect('/pesanan');
    }else{
      return back()->with('error', 'Gagal membatalkan pesanan');
    }
  }

  public function createRescue(){
    return view('pages.client.pesanan-baru-rescue');
  }

  public function storeRescue(Request $request){
    $request->validate([
      'location_lat' => 'required',
      'location_lng' => 'required',
      'description' => 'required',
      'phone' => 'required',
    ]);

    $code = 'SCRESC'.date('Y').date('m').date('d').date('H').date('i').date('s').Auth::id();

    $order = Order::create([
      'code' => $code,
      'service_id' => 1,
      'statud_id' => 1,
      'location_lat' => $request->location_lat,
      'location_lng' => $request->location_lng,
      'phone' => $request->phone,
      'date' => now(),
      'time' => now(),
      'description' => $request->description,
      'user_id' => Auth::id()
    ]);

    $order_history = OrderHistory::create([
      'order_id' => $order->id,
      'status_id' => 1
    ]);

    if($order && $order_history){
      return redirect('/pesanan')->with('success', 'Pesanan anda berhasil disimpan');
    }else{
      return back()->with('error', 'Pesanan anda gagal disimpan');
    }
  }

  public function createHomecare(){
    $subservices = Subservice::where('is_available', 1)->get();
    return view('pages.client.pesanan-baru-homecare', compact('subservices'));
  }

  public function storeHomecare(Request $request){
    return redirect('/pesanan-baru/homecare/'.$request->subservice_id);
  }

  public function createHomecareNext($id){
    $subservice = Subservice::where('is_available', 1)->where('id', $id)->firstOrFail();
    return view('pages.client.pesanan-baru-homecare-next', compact('subservice'));
  }

  public function storeHomecareNext($id, Request $request){
    $request->validate([
      'subservice_id' => 'required',
      'location' => 'required|in:1,2',
      'location_lat' => 'required_if:location,1',
      'location_lng' => 'required_if:location,1',
      'date' => 'required',
      'phone' => 'required'
    ]);

    $code = 'SCCARE'.date('Y').date('m').date('d').date('H').date('i').date('s').Auth::id();

    $store = Order::create([
      'code' => $code,
      'service_id' => 2,
      'status_id' => 1,
      'location_lat' => $request->location_lat,
      'location_lng' => $request->location_lng,
      'is_homevisit' => $request->location == 1 ? 1 : 0,
      'phone' => $request->phone,
      'date' => $request->date,
      'time' => now(),
      'subservice_id' => $id,
      'description' => $request->description,
      'user_id' => Auth::id()
    ]);

    if($store){
      return redirect('/pesanan')->with('success', 'Pesanan berhasil disimpan');
    }else{
      return back()->with('error', 'Pesanan gagal disimpan');
    }
  }
}
