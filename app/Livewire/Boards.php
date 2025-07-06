<?php

namespace App\Livewire;

use App\Enums\BoardStatus;
use App\Models\Board;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
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
        $this->dispatch('successMessage');
    }

    #[On('destroyBoard')]
    public function destroyBoard($id)
    {
        Board::destroy($id);
    }

    #[On('archivedBoard')]
    public function archivedBoard($id)
    {
        $board = Board::query()->find($id);
        $board->update([
            'status' => BoardStatus::ARCHIVED->value,
        ]);
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
