<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $knowledge->title }}
        </h2>
    </x-slot>

<h1>{{ $knowledge->title }}</h1>

<p> カテゴリ：{{ $knowledge->category->name }} </p>

<hr>
    <x-markdown :content="$knowledge->content" />
<hr>

<a href="{{ route('knowledge.edit', $knowledge) }}">編集</a>

<form action="{{ route('knowledge.destroy', $knowledge) }}" method="POST" >
    @csrf
    @method('DELETE')
    <button type="submit">削除</button>
</form>

<a href="{{ route('knowledge.index') }}"> 一覧へ戻る </a>

</x-app-layout>