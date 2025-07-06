<?php

namespace App\Livewire;

use App\Enums\BoardStatus;
use App\Models\Board;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Boards extends Component
{

    public $title;
    public $description;
    public function saveBoard(): void
    {
        Board::query()->create([
            'title' => $this->title,
            'user_id'=>auth()->user()->id,
            'description'=>$this->description,
        ]);

        $this->dispatch('closeModal');
    }
    #[Layout('panel.master')]
    public function render():View
    {
        $boards = Board::query()
            ->where('user_id', auth()->user()->id)
            ->where('status', BoardStatus::ACTIVE->value)
            ->get();
        return view('livewire.boards', compact('boards'));
    }
}
