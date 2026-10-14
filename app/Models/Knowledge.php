<?php

namespace App\Models;

use App\Enums\KnowledgeStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ナレッジEloquentモデル
 */
class Knowledge extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'category_id',
        'title',
        'content',
    ];

    protected function casts(): array
    {
        return [
            'status' => KnowledgeStatus::class,
        ];
    }

    /**
     * ユーザーを取得する
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * カテゴリを取得する
     *
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * タグを取得する
     *
     * @return BelongsToMany<Tag, $this>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * ルートノードを取得する
     *
     * @return HasMany<KnowledgeNode, $this>
     */
    public function rootNodes(): HasMany
    {
        return $this->hasMany(KnowledgeNode::class)
            ->whereNull('parent_id')
            ->orderBy('sort_order');
    }

    /**
     * 全てのノードを取得する
     *
     * @return HasMany<KnowledgeNode, $this>
     */
    public function nodes(): HasMany
    {
        return $this->hasMany(KnowledgeNode::class);
    }

    /**
     * 公開されているナレッジのみを取得するスコープ
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', KnowledgeStatus::PUBLISHED);
    }

    /**
     * 下書きのナレッジのみを取得するスコープ
     */
    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', KnowledgeStatus::DRAFT);
    }
}
