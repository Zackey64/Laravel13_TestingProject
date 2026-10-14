<div class="space-y-3">
    @switch($node->type)
        @case('section')
            <h2 class="border-b pb-2 text-xl font-bold">
                {{ $node->title }}
            </h2>
            @break

        @case('part')
            <h3 class="text-lg font-semibold">
                {{ $node->title }}
            </h3>
            @break

        @case('text')
            @if ($node->title)
                <h4 class="font-semibold">
                    {{ $node->title }}
                </h4>
            @endif

            <div class="whitespace-pre-wrap">{{ $node->content }}</div>
            @break

        @case('code')
            @if ($node->title)
                <h4 class="font-semibold">
                    {{ $node->title }}
                </h4>
            @endif

            <pre class="overflow-x-auto rounded-lg bg-gray-900 p-4 text-sm text-white"><code>{{ $node->content }}</code></pre>
            @break
    @endswitch

    @if ($node->children->isNotEmpty())
        <div class="ml-4 space-y-4 border-l-2 border-gray-200 pl-4">
            @foreach ($node->children as $child)
                @include('knowledge.nodes', ['node' => $child])
            @endforeach
        </div>
    @endif
</div>