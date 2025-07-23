<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardColumn extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'board_id',
        'title',
        'status',
        'order'
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
