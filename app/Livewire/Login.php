<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $username=null;
    public $pin=null;
    // public function mount(){
    //     $this->username=$username;
    //     $this->pin=$pin;
    // }
    public function login(){

    }
    public function render()
    {
        return view('livewire.login');
    }
}
