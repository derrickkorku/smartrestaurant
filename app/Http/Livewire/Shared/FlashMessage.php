<?php

namespace App\Http\Livewire\Shared;

use Livewire\Component;

class FlashMessage extends Component
{
    public $listeners = ['message' => 'flashMessage'];

    public function render()
    {
        return view('livewire.shared.flash-message');
    }

    public function flashMessage($type, $message){
        session()->flash($type, $message);
    }
}
