<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ナレッジ編集
        </h2>
    </x-slot>

    <x-page-actions>
        <a href="{{ route('knowledge.show', $knowledge) }}">詳細へ戻る</a>
    </x-page-actions>
    
    <x-page-container>
        <form action="{{ route('knowledge.update', $knowledge) }}" method="POST">
            @csrf
            @method('PUT')
            @include('knowledge._form')
            <button type="submit">更新</button>
        </form>
    </x-page-container>

</x-app-layout>