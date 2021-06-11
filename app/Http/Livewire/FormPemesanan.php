<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Subservice;

class FormPemesanan extends Component
{
  public $layanan, $sublayanan, $lokasi, $jadwal, $detailKejadian;
  public $showSublayanan = false;
  public $lokasiDisabled = false;
  public $detailKejadianShow = false;
  public $jadwalSekarang = false;
  public $lokasiUser = true;

  public function changeLayanan($layanan){
    $this->layanan = $layanan;
    if($layanan == 1){
      $this->showSublayanan = false;
      $this->lokasi = 2;
      $this->lokasiDisabled = true;
      $this->detailKejadianShow = true;
      $this->jadwalSekarang = true;
    }else{
      $this->showSublayanan = true;
      $this->lokasi = null;
      $this->lokasiDisabled = false;
      $this->detailKejadianShow = false;
      $this->jadwalSekarang = false;
    }
  }

  public function updatedLokasi(){
    if($this->lokasi == 1){
      $this->lokasiUser = false;
    }else{
      $this->lokasiUser = true;
    }
  }

  public function updatedSubLayanan(){
    $sublayanan = Subservice::findOrFail($this->sublayanan);

    if($sublayanan->is_homevisitable == 0){
      $this->lokasi = 1;
      $this->lokasiDisabled = true;
      $this->lokasiUser = false;

    }else{
      $this->lokasi = null;
      $this->lokasiDisabled = false;
      $this->lokasiUser = true;
    }
  }

  public function save(){
    if($this->layanan == 1){
      // jika rescue
      $order = Order::create([
        'code' => 'SCRESC'.date('Y').date('m').date('d').date('H').date('i').date('s').Auth::id(),
        'service_id' => 1,
        'location_lat' => 
      ])
    }
  }

  public function render(){
    $subservices = Subservice::where('is_available', 1)->orderBy('name')->get();
    return view('livewire.form-pemesanan', compact('subservices'));
  }
}
