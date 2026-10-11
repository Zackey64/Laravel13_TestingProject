<?php

namespace Database\Seeders;

use App\Enums\KnowledgeStatus;
use App\Models\Category;
use App\Models\Knowledge;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class KnowledgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $category = Category::where('name', 'Laravel')->first();

        foreach ($users as $user) {
            $knowledge = Knowledge::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => 'FormRequestについて',
                'content' => <<<'MARKDOWN'
            ## FormRequestとは
            バリデーション処理を専用のクラスに分離するために使用する。
            MARKDOWN,
                'status' => KnowledgeStatus::PUBLISHED->value,
            ]);

            $knowledge->tags()->attach([
                Tag::where('name', 'ロジック')->first()->id,
                Tag::where('name', '設計')->first()->id,
            ]);
        }
    }
}
