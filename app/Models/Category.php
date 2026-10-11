<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * カテゴリーEloquentモデル
 */
class Category extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany<Knowledge, $this>
     */
    public function knowledge(): HasMany
    {
        return $this->hasMany(Knowledge::class);
    }
}
