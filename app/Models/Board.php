<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];

    public function board_columns():HasMany
    {
        return $this->hasMany(BoardColumn::class);
    }
}
