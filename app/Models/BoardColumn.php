<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class BoardColumn extends Model implements Sortable
{
    use SoftDeletes , SortableTrait;

    protected $fillable = [
        'board_id',
        'title',
        'status',
        'order'
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($element) {
            $max = BoardColumn::max('order');
            $element->order = $max + 1;
        });
    }
}
