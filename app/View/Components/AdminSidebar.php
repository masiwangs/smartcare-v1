<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Order;
use App\Models\User;

class AdminSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
      $pesanan_baru_count = Order::where('status_id', 1)->count();
      $pesanan_dikonfirmasi_count = Order::where('status_id', 2)->count();
      $pesanan_dilaksanakan_count = Order::where('status_id', 3)->count();
      $pesanan_menunggu_pembayaran_count = Order::where('status_id', 4)->count();
      $pesanan_selesai_count = Order::where('status_id', 5)->count();
      $pesanan_dibatalkan_count = Order::where('status_id', 6)->count();
      $user_count = User::where('role', 'client')->count();
      $admin_count = User::where('role', 'admin')->count();
      return view('components.admin-sidebar', compact(
        'pesanan_baru_count',
        'pesanan_dikonfirmasi_count',
        'pesanan_dilaksanakan_count',
        'pesanan_menunggu_pembayaran_count',
        'pesanan_selesai_count',
        'pesanan_dibatalkan_count',
        'user_count',
        'admin_count',
      ));
    }
}
