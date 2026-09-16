<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKnowledgeRequest extends FormRequest
{
    /**
     * リクエストの認可を判定する
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルールを返す
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ];
    }

    /**
     * バリデーションメッセージを返す
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'カテゴリは必須',
            'title.required' => 'タイトルは必須',
            'title.max' => 'タイトルは255字まで',
            'content.required' => '内容は必須',
        ];
    }
}
