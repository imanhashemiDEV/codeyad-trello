<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardColumns extends Component
{


    #[Layout('panel.master')]
    public function render():View
    {
        return view('livewire.board-columns');
    }
}
