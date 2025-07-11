<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BoardColumn extends Model
{
    protected $fillable = [
        'board_id',
        'title'
    ];

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
