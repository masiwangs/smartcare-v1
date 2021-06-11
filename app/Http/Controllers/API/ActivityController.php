<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Activity;

class ActivityController extends Controller
{
  public function index(Request $request){
    $activities = Activity::with('subservice')->with('status');

    if(in_array($request->type, ['rescue', 'homecare'])){
      $type = $request->type;

      if($type == 'rescue'){
        $activities = $activities->where('service_id', 1 );
      }else{
        $activities = $activities->where('service_id', 2 );
      }
    }

    if(in_array($request->status, [1, 2, 3, 4, 5])){
      $activities = $activities->where('status_id', $request->status);
    }
    
    $activities = $activities->paginate(10);

    // todo hanya admin yang bisa get semua aktivitas

    return response()->json($activities, 200);
  }
}
