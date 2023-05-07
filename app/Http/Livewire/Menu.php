<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sala as SalaModel;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.menu');
    }
}
