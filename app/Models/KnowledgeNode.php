<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KnowledgeNode extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'knowledge_id',
        'parent_id',
        'type',
        'title',
        'content',
        'sort_order',
    ];

    /**
     * 所属するナレッジ
     */
    public function knowledge(): BelongsTo
    {
        return $this->belongsTo(Knowledge::class);
    }

    /**
     * 親ノード
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * 子ノード一覧
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')
            ->orderBy('sort_order');
    }

    /**
     * 子孫を含めた階層
     */
    public function descendants(): HasMany
    {
        return $this->children()->with('descendants');
    }
}
