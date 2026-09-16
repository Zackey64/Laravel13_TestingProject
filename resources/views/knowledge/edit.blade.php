<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ナレッジ編集
        </h2>
    </x-slot>

<form action="{{ route('knowledge.update', $knowledge) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="category_id">カテゴリ</label>
        <select name="category_id" id="category_id">
            <option value="">選択してください</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $knowledge->category_id) == $category->id) >
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
        <input type="text" name="title" id="title" value="{{ old('title', $knowledge->title) }}" >
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="content">内容</label>
        <textarea name="content" id="content" rows="20" >{{ old('content', $knowledge->content) }}</textarea>
        @error('content')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">更新</button>

</form>

<a href="{{ route('knowledge.show', $knowledge) }}">一覧へ戻る</a>


</x-app-layout>