<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Database\Eloquent\Relations\MorphTo;

use App\Models\Order;
use App\Models\OrderHistory;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $orders = Order::addSelect(['status_id' => OrderHistory::select('status_id')
        ->whereColumn('order_id', 'orders.id')
        ->orderByDesc('status_id')
        ->limit(1)
      ]);

      if($request->status){
        $orders = $orders->where(function ($query){
          $query->select('status_id')
          ->from('order_histories')
          ->whereColumn('order_histories.order_id', 'orders.id')
          ->orderByDesc('status_id')
          ->limit(1);
        }, $request->status);
      }
      
      $orders = $orders->with('history')->get();

      return response()->json($orders, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'service_id' => 'required|in:1,2',
        'location_lat' => 'required',
        'location_lng' => 'required',
        'address_detail' => 'required',
        'description' => 'required'
      ];
      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return response()->json($validator->messages(), 200);
      }

      $code = ($request->service_id == 1 ? 'SCRESC' : 'SCCARE').date('Y').date('m').date('d').date('H').date('i').date('s').'1';

      $order = Order::create([
        'code' => $code,
        'service_id' => $request->service_id,
        'subservice_id' => ($request->service_id == 1 ? null : $request->subsevice_id),
        'location_lat' => $request->location_lat,
        'location_lng' => $request->location_lng,
        'address_detail' => $request->address_detail,
        'address_road' => $request->address_road ?? '',
        'address_village' => $request->address_village ?? '',
        'address_subdistrict' => $request->address_subdistrict,
        'address_regency' => $request->address_regency,
        'address_province' => $request->address_province,
        'address_postcode' => $request->address_postcode,
        'date' => $request->date ?? now(),
        'time' => $request->time ?? now(),
        'description' => $request->description,
        'user_id' => 1
      ]);

      if($order){
        $history = OrderHistory::create([
          'order_id' => $order->id,
          'status_id' => 1,
          'admin_id' => 1
        ]);
        return response()->json(200);
      }else{
        return response()->json(400);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $order = Order::with('history');
      $order = $order->findOrFail($id);

      return response()->json($order, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
