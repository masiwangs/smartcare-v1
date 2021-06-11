<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Activity;

class ActivityController extends Controller
{
  public function index (Request $request) {
    $activities = Activity::where('user_id', Auth::id());

    if(in_array($request->service_id, [1, 2])){
      $activities = $activities->where('service_id', $request->service_id);
    }

    if($request->code){
      $activities = $activities->where('code', 'like', '%'.$request->code.'%');
    }

    $activities = $activities->get();
    return view('pages.activity', compact('activities'));
  }

  public function newRescue(Request $request){
    $request->validate([
      'location_lat' => 'required',
      'location_lng' => 'required',
      'address_detail' => 'required',
      'description' => 'required'
    ]);

    $code = 'SCRESC'.date('Y').date('m').date('d').date('H').date('i').date('s').Auth::id();

    if(
      Activity::create([
        'code' => $code,
        'service_id' => 1,
        'location_lat' => $request->location_lat,
        'location_lng' => $request->location_lng,
        'address_detail' => $request->address_detail,
        'address_road' => $request->address_road ?? '',
        'address_village' => $request->address_village ?? '',
        'address_subdistrict' => $request->address_subdistrict,
        'address_regency' => $request->address_regency,
        'address_province' => $request->address_province,
        'address_postcode' => $request->address_postcode,
        'date' => now(),
        'time' => now(),
        'description' => $request->description,
        'user_id' => Auth::id(),
        'status_id' => 1
      ])
    ){
      return redirect('/aktivitas');
    }else{
      return back()->with('error', 'Coba lagi');
    }
  }

  public function newHomecare(Request $request){
    $request->validate([
      'location_lat' => 'required',
      'location_lng' => 'required',
      'address_detail' => 'required',
      'description' => 'required',
      'subservice_id' => 'required'
    ]);

    $code = 'SCCARE'.date('Y').date('m').date('d').date('H').date('i').date('s').Auth::id();

    if(
      Activity::create([
        'code' => $code,
        'service_id' => 2,
        'subservice_id' => $request->subservice_id,
        'location_lat' => $request->location_lat,
        'location_lng' => $request->location_lng,
        'address_detail' => $request->address_detail,
        'address_road' => $request->address_road ?? '',
        'address_village' => $request->address_village ?? '',
        'address_subdistrict' => $request->address_subdistrict,
        'address_regency' => $request->address_regency,
        'address_province' => $request->address_province,
        'address_postcode' => $request->address_postcode,
        'date' => now(),
        'time' => now(),
        'description' => $request->description,
        'user_id' => Auth::id(),
        'status_id' => 1
      ])
    ){
      return redirect('/aktivitas');
    }else{
      return back()->with('error', 'Coba lagi');
    }
  }
}
