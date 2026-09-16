<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKnowledgeRequest;
use App\Http\Requests\UpdateKnowledgeRequest;
use App\Models\Category;
use App\Models\Knowledge;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KnowledgeController extends Controller
{
    /**
     * ナレッジ一覧を表示
     */
    public function index(): View
    {
        $knowledges = Knowledge::with('category')->latest()->paginate(10);

        return view('knowledge.index', compact('knowledges'));
    }

    /**
     * ナレッジ作成画面を表示
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('knowledge.create', compact('categories'));
    }

    /**
     * 新しいナレッジを保存する
     */
    public function store(StoreKnowledgeRequest $request): RedirectResponse
    {
        $knowledge = Knowledge::create($request->validated());

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
        $categories = Category::all();

        return view('knowledge.edit', compact('knowledge', 'categories'));
    }

    /**
     * ナレッジを更新する
     */
    public function update(UpdateKnowledgeRequest $request, Knowledge $knowledge): RedirectResponse
    {
        $knowledge->update($request->validated());

        return redirect()->route('knowledge.show', $knowledge)
            ->with('success', 'ナレッジを更新しました。');
    }

    /**
     * ナレッジを削除
     */
    public function destroy(Knowledge $knowledge): RedirectResponse
    {
        $knowledge->delete();

        return redirect()->route('knowledge.index')
            ->with('success', 'ナレッジを削除しました。');
    }
}
