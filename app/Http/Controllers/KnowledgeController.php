<?php

namespace App\Http\Controllers;

use App\Enums\KnowledgeStatus;
use App\Http\Requests\StoreKnowledgeRequest;
use App\Http\Requests\UpdateKnowledgeRequest;
use App\Models\Category;
use App\Models\Knowledge;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KnowledgeController extends Controller
{
    use AuthorizesRequests;

    /**
     * ナレッジ一覧を表示
     */
    public function index(): View
    {
        $knowledges = Knowledge::published()
            ->with('category')
            ->latest()
            ->paginate(10);

        return view('knowledge.index', compact('knowledges'));
    }

    /**
     * ナレッジ作成画面を表示
     */
    public function create(): View
    {
        $this->authorize('create', Knowledge::class);

        $categories = Category::all();

        return view('knowledge.create', compact('categories'));
    }

    /**
     * 新しいナレッジを保存する
     */
    public function store(StoreKnowledgeRequest $request): RedirectResponse
    {
        $this->authorize('create', Knowledge::class);

        $validated = $request->validated();

        $knowledge = auth()->user()->knowledges()->create($validated);

        return redirect()->route('knowledge.show', $knowledge)
            ->with('success', 'ナレッジを登録しました。');
    }

    /**
     * ナレッジの詳細を表示
     */
    public function show(Knowledge $knowledge): View
    {
        $knowledge->load(['category', 'tags']);

        return view('knowledge.show', compact('knowledge'));
    }

    /**
     * ナレッジ編集画面を表示
     */
    public function edit(Knowledge $knowledge): View
    {
        $this->authorize('update', $knowledge);

        $categories = Category::all();

        return view('knowledge.edit', compact('knowledge', 'categories'));
    }

    /**
     * ナレッジを更新する
     */
    public function update(UpdateKnowledgeRequest $request, Knowledge $knowledge): RedirectResponse
    {
        $this->authorize('update', $knowledge);

        $validated = $request->validated();

        $knowledge->update($validated);

        return redirect()->route('knowledge.show', $knowledge)
            ->with('success', 'ナレッジを更新しました。');
    }

    /**
     * ナレッジを削除
     */
    public function destroy(Knowledge $knowledge): RedirectResponse
    {
        $this->authorize('delete', $knowledge);

        $knowledge->delete();

        return redirect()->route('knowledge.index')
            ->with('success', 'ナレッジを削除しました。');
    }

    /**
     * ナレッジを公開する
     */
    public function publish(Knowledge $knowledge): RedirectResponse
    {
        $this->authorize('update', $knowledge);

        if ($knowledge->status === KnowledgeStatus::PUBLISHED) {
            return redirect()->route('knowledge.show', $knowledge)
                ->with('info', 'ナレッジは既に公開の状態です。');
        }

        $knowledge->update(['status' => KnowledgeStatus::PUBLISHED]);

        return redirect()->route('knowledge.show', $knowledge)
            ->with('success', 'ナレッジを公開しました。');
    }

    /**
     * ナレッジを下書きに戻す
     */
    public function draft(Knowledge $knowledge): RedirectResponse
    {
        $this->authorize('update', $knowledge);

        if ($knowledge->status === KnowledgeStatus::DRAFT) {
            return redirect()->route('knowledge.show', $knowledge)
                ->with('info', 'ナレッジは既に下書の状態です。');
        }

        $knowledge->update(['status' => KnowledgeStatus::DRAFT]);

        return redirect()->route('knowledge.show', $knowledge)
            ->with('success', 'ナレッジを下書きに戻しました。');
    }
}
