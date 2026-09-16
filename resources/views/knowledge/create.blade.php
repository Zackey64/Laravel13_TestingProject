<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ナレッジ新規作成
        </h2>
    </x-slot>

    <x-page-actions>
        <a href="{{ route('knowledge.index') }}">一覧へ戻る</a>
    </x-page-actions>

    <x-page-container>
        <form action="{{ route('knowledge.store') }}" method="POST">
            @csrf
            @include('knowledge._form')
            <button type="submit">登録</button>
        </form>
    </x-page-container>

</x-app-layout>