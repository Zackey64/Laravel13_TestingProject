<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Knowledge;

class KnowledgeNodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $knowledge = Knowledge::where('title', 'FormRequestについて')
            ->firstOrFail();

        // セクション1：概要
        $overview = $knowledge->nodes()->create([
            'type' => 'section',
            'title' => 'FormRequestとは',
            'sort_order' => 1,
        ]);
        // パート1：概要の詳細
        $overview->children()->create([
            'knowledge_id' => $knowledge->id,
            'type' => 'part',
            'title' => 'FormRequestの基本',
            'sort_order' => 1,
        ]);

        // セクション2：作成方法
        $creation = $knowledge->nodes()->create([
            'type' => 'section',
            'title' => '作成方法',
            'sort_order' => 2,
        ]);
        // パート2：作成方法の詳細
        $creation->children()->create([
            'knowledge_id' => $knowledge->id,
            'type' => 'part',
            'title' => 'FormRequestの作成手順',
            'sort_order' => 1,
        ]);
        $creation->children()->create([
            'knowledge_id' => $knowledge->id,
            'type' => 'code',
            'title' => '作成コマンド',
            'content' => 'php artisan make:request StoreKnowledgeRequest',
            'sort_order' => 2,
        ]);

        // セクション3：バリデーション
        $validation = $knowledge->nodes()->create([
            'type' => 'section',
            'title' => 'バリデーション',
            'sort_order' => 3,
        ]);

        $part = $validation->children()->create([
            'knowledge_id' => $knowledge->id,
            'type' => 'part',
            'title' => 'rulesメソッド',
            'sort_order' => 1,
        ]);
        $part->children()->create([
            'knowledge_id' => $knowledge->id,
            'type' => 'code',
            'title' => '実装例',
            'content' => <<<'PHP'
public function rules(): array
{
    return [
        'title' => ['required', 'string', 'max:255'],
    ];
}
PHP,
            'sort_order' => 1,
        ]);

        $part->children()->create([
            'knowledge_id' => $knowledge->id,
            'type' => 'text',
            'content' => 'rulesメソッドで入力値に対するバリデーションルールを定義する。',
            'sort_order' => 2,
        ]);

    }
}
