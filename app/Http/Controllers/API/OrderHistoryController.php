<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Order;
use App\Models\OrderHistory;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($order_id, Request $request)
    {
      $rules = [
        'status_id' => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return response()->json($validator->messages(), 200);
      }

      $order = Order::find($order_id);

      if(!$order){
        return response()->json(404);
      }

      $is_exist = OrderHistory::where(['order_id' => $order_id, 'status_id' => $request->id])->first();

      if($is_exist){
        return response()->json(400);
      }

      $history = OrderHistory::create([
        'order_id' => $order_id,
        'status_id' => $request->status_id,
        'admin_id' => 1
      ]);

      if($history){
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
