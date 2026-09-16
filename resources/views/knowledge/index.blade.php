<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ナレッジ一覧
        </h2>
    </x-slot>

    <a href="{{ route('knowledge.create') }}"> 新規登録 </a>
    {{-- ナレッジ一覧 --}}
    <div class="space-y-4">
        @forelse ($knowledges as $knowledge)
            <article class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- タイトル --}}
                    <h3 class="text-xl font-semibold text-gray-900">
                        <a href="{{ route('knowledge.show', $knowledge) }}" class="hover:underline" >
                            {{ $knowledge->title }}
                        </a>
                    </h3>
                    {{-- カテゴリー --}}
                    <p class="mt-2 text-sm text-gray-500">
                        カテゴリー：{{ $knowledge->category->name }}
                    </p>
                    {{-- 内容 --}}
                    <p class="mt-4 text-gray-600">
                        {{ Str::limit($knowledge->content, 150) }}
                    </p>
                </div>
            </article>
        @empty
            <p>ナレッジがありません</p>
        @endforelse
    </div>
    {{-- ページネーション --}}
    <div class="mt-6">
        {{ $knowledges->links() }}
    </div>

</x-app-layout>