<?php

namespace App\Livewire;

use App\Models\Board;
use App\Models\BoardColumn;
use App\Models\Card;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class BoardColumns extends Component
{

     public Board $board;

     public $title,$card_title,$column_id,$users;

    public function mount()
    {
        $this->users = User::query()->get()->toArray();
     }

     // Column Functions
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
        return BoardColumn::query()
            ->where('board_id', $this->board->id)
            ->ordered()
            ->get();
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

    public function updateBoardColumnOrder(array $items): void
    {
        $orders = collect($items)->pluck('value')->toArray();
        BoardColumn::setNewOrder($orders,1,'id',function (Builder $builder){
              $builder->where('board_id', $this->board->id);
        });
    }


    // Card Functions
    #[On('storeCard')]
    public function storeCard($selected_users): void
    {
        $card_users = collect(json_decode($selected_users))->pluck('id')->toArray();
        $card = Card::query()->create([
            'board_column_id'=>$this->column_id,
            'title'=>$this->card_title,
        ]);

        $card->users()->sync($card_users);

        $this->dispatch('closeCardModal');
        $this->dispatch('successMessage',['title'=>'وظیفه ایجاد شد']);
    }

    #[On('destroyCard')]
    public function destroyCard($id): void
    {
        Card::destroy($id);
    }

    #[Layout('panel.master')]
    public function render():View
    {
        return view('livewire.board-columns');
    }
}
