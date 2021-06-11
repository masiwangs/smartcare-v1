<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Activity;
use App\Models\Subservice;

class HomeController extends Controller
{
  public function index () {
    $activities = Activity::where('user_id', Auth::id())->get();
    $subservices = Subservice::where('is_available', 1)->orderBy('name')->get();
    return view('pages.index', compact('activities', 'subservices'));
  }
}
