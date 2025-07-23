<?php

namespace App\Livewire;

use App\Models\Board;
use App\Models\BoardColumn;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class BoardColumns extends Component
{

     public Board $board;

     public $title;

    public function createBoardColumn(): void
    {
        BoardColumn::query()->create([
            'board_id'=> $this->board->id,
            'title'=>$this->title,
        ]);

        $this->dispatch('closeModal');
        $this->dispatch('successMessage',['title'=>'ستون ایجاد شد']);
     }

     #[Computed()]
    public function boardColumns():Collection
    {
        return BoardColumn::query()->where('board_id', $this->board->id)->get();
     }

     #[Renderless]
    public function updateColumn($column_id, $title): void
     {
        $column = BoardColumn::query()->find($column_id);
        $column->update([
            'title'=>$title,
        ]);
     }

    #[On('destroyBoardColumn')]
    public function destroyBoardColumn($id): void
    {
        BoardColumn::destroy($id);
    }


    #[Layout('panel.master')]
    public function render():View
    {
        return view('livewire.board-columns');
    }
}
