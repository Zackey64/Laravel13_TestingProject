<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * タグEloquentモデル
 */
class Tag extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
    ];

    /**
     * @return BelongsToMany<Knowledge, $this>
     */
    public function knowledge(): BelongsToMany
    {
        return $this->belongsToMany(Knowledge::class);
    }
}
