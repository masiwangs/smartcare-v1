<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Hash;

use App\Models\User;

class ClientProfile extends Component
{
  public $view = 'profile';
  public $old_password, $password, $password_confirm;
  public $old_password_error, $error, $success;

  protected $rules = [
    'old_password' => 'required',
    'password' => 'required|min:6',
    'password_confirm' => 'required|same:password',
];

  public function update_password(){
    $this->validate();

    $user = User::find(Auth::id());

    $check_old_password = Hash::check($this->old_password, $user->password);

    $update = $user->update([
      'password' => Hash::make($this->password)
    ]);

    if($update){
      $this->old_password = '';
      $this->password = '';
      $this->password_confirm = '';
    }
  }

  public function render(){
    return view('livewire.client-profile');
  }
}
