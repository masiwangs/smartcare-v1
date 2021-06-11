<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Subservice;

class AdminLayananTable extends Component
{
  public $subservices;

  protected $rules = [
    'subservices.*.is_available' => 'required|in:0,1',
    'subservices.*.is_homevisitable' => 'required|in:0,1'
  ];

  public function mount(){
    $this->subservices = Subservice::get();
  }

  public function save(){
    $this->validate();

    foreach ($this->subservices as $subservice) {
      $subservice->save();
    }
  }

  public function render(){
    return view('livewire.admin-layanan-table');
  }
}
