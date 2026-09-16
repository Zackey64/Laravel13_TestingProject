<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ナレッジ新規作成
        </h2>
    </x-slot>

<form action="{{ route('knowledge.store') }}" method="POST">
    @csrf

    <div>
        <label for="category_id">カテゴリ</label>
        <select name="category_id" id="category_id">
            <option value="">選択してください</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id) >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" >
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="content">内容</label>
        <textarea name="content" id="content" rows="20" >{{ old('content') }}</textarea>
        @error('content')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">登録</button>

</form>

<a href="{{ route('knowledge.index') }}">一覧へ戻る</a>

</x-app-layout>