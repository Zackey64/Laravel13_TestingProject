<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'ロジック',
            '表示',
            'データベース',
            '設計',
            'エラー',
            'ネットワーク',
        ];

        foreach ($names as $name) {
            Tag::create([
                'name' => $name,
            ]);
        }
    }
}
