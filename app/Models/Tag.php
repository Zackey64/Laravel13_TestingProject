<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * タグEloquentモデル
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Knowledge> $knowledge
 */
class Tag extends Model
{
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
