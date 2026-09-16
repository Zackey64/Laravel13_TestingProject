<div>
    {{-- カテゴリー --}}
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">
            カテゴリ
        </label>
        <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">選択してください</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $knowledge->category_id ?? '') == $category->id) >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- タイトル --}}
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">
            タイトル
        </label>
        <input type="text" name="title" id="title" value="{{ old('title', $knowledge->title ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- 内容 --}}
    <div>
        <label for="content" class="block text-sm font-medium text-gray-700">
            内容
        </label>
        <textarea name="content" id="content" rows="20" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 font-mono">
            {{ old('content', $knowledge->content ?? '') }}
        </textarea>
        @error('content')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>