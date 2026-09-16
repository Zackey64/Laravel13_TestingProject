<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Knowledge;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class KnowledgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laravel = Category::where('name', 'Laravel')->first();

        $knowledge = Knowledge::create([
            'category_id' => $laravel->id,
            'title' => 'FormRequestについて',
            'content' => <<<'MARKDOWN'
            ## FormRequestとは
            バリデーション処理を専用のクラスに分離するために使用する。
            MARKDOWN,
        ]);

        $knowledge->tags()->attach([
            Tag::where('name', 'ロジック')->first()->id,
            Tag::where('name', '設計')->first()->id,
        ]);
    }
}
