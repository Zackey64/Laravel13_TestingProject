<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * カテゴリーEloquentモデル
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Knowledge> $knowledge
 */
class Category extends Model
{
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
