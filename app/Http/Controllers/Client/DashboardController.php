<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Subservice;

class DashboardController extends Controller
{
  public function index(){
    $subservices = Subservice::where('is_available', 1)->get();
    return view('pages.client.dashboard', compact('subservices'));
  }
}
