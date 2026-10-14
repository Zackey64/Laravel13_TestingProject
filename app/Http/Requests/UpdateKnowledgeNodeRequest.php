<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKnowledgeNodeRequest extends FormRequest
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
            'parent_id' => ['nullable', 'ulid'],
            'type' => ['required', 'in:section,part,text,code'],
            'title' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'sort_order' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
