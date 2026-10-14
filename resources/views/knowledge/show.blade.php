<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $knowledge->title }}
        </h2>
    </x-slot>

    <x-page-actions>
        <a href="{{ route('knowledge.index') }}"> 一覧へ戻る </a>
        <div class="flex gap-4">
            <a href="{{ route('knowledge.edit', $knowledge) }}">編集</a>
            <form action="{{ route('knowledge.destroy', $knowledge) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
            
        </div>
    </x-page-actions>

    <x-page-container>
        <div class="px-4 py-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-2xl font-bold">
                {{ $knowledge->title }}
            </h1>

            @if ($knowledge->category)
                <p class="mt-2 text-sm text-gray-500">
                    {{ $knowledge->category->name }}
                </p>
            @endif

            <div class="mt-6 space-y-6">
                @forelse ($knowledge->rootNodes as $node)
                    @include('knowledge.nodes', ['node' => $node])
                @empty
                    <p class="text-gray-500">
                        まだ内容が登録されていません。
                    </p>
                @endforelse
            </div>
        </div>
    </x-page-container>

</x-app-layout>