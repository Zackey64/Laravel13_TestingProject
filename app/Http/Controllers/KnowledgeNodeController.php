<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKnowledgeNodeRequest;
use App\Models\Knowledge;
use App\Models\KnowledgeNode;
use Illuminate\Http\RedirectResponse;

class KnowledgeNodeController extends Controller
{
    /**
     * ナレッジノードを保存する
     */
    public function store(StoreKnowledgeNodeRequest $request, Knowledge $knowledge): RedirectResponse
    {
        $validated = $request->validated();

        if (! empty($validated['parent_id'])) {
            $knowledge->nodes()
                ->findOrFail($validated['parent_id']);
        }

        $knowledge->nodes()->create($validated);

        return back();
    }

    /**
     * ナレッジノードを編集する
     */
    public function update(StoreKnowledgeNodeRequest $request, Knowledge $knowledge, KnowledgeNode $node): RedirectResponse
    {
        $validated = $request->validated();

        $knowledge->nodes()->findOrFail($node->id);

        $node->update($validated);

        return back();
    }

    /**
     * ナレッジノードを削除する
     */
    public function destroy(Knowledge $knowledge, KnowledgeNode $node): RedirectResponse
    {
        $knowledge->nodes()->findOrFail($node->id);

        $node->delete();

        return back();
    }
}
