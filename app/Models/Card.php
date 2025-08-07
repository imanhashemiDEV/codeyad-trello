<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Card extends Model implements Sortable
{
    use SoftDeletes , SortableTrait;
    protected $fillable = [
        'board_column_id',
        'title',
        'status',
        'order'
    ];

    public function boardColumn(): BelongsTo
    {
       return $this->belongsTo(BoardColumn::class);
    }

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($element) {
            $max = Card::max('order');
            $element->order = $max + 1;
        });
    }
}
