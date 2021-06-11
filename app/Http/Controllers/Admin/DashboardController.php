<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Subservice;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
      $rescues = Order::where('service_id', 1)->orderBy('id')->get();
      $homecares = Order::where('service_id', 2)->orderBy('id')->limit(5)->get();
      $subservices = Order::with('subservice')->select('subservice_id', DB::raw('count(subservice_id) as total_order'))->groupBy('subservice_id')->whereNotNull('subservice_id')->orderByDesc('total_order')->get();
      $users = User::orderByDesc('id')->limit(5)->get();

      $pesanan_baru_count = Order::where('status_id', 1)->count();
      $total_pesanan_count = Order::count();

      $user_count = User::where('role', 'client')->count();

      $subservice_count = Subservice::where('is_available', 1)->count();
      return view('pages.admin.index', compact(
        'homecares', 
        'rescues', 
        'subservices', 
        'users',
        'pesanan_baru_count',
        'total_pesanan_count',
        'subservice_count',
        'user_count',
      ));
    }
}
