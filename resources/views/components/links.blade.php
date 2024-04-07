<div class="flex overflow-x-scroll">
    @foreach ($tabs->tabs as $tabLink)
        @if ($tabLink->enabled)
            @php
                // Dynamic classes based on tab active status
                $linkClasses =
                    $tabLink->id === $tabs->activeTab
                        ? 'border-indigo-400 dark:border-indigo-600 text-gray-700 dark:text-gray-100'
                        : 'border-gray-100 dark:border-gray-700 text-gray-400 dark:text-gray-400';
            @endphp

            <div wire:click="$parent.switchTab('{{ $tabs->id }}', '{{ $tabLink->id }}')" key="{{ $tabLink->id }}"
                class='px-6 py-4 cursor-pointer border-b-2 grow hover:text-gray-700 dark:hover:text-gray-100 {{ $linkClasses }}'>
                {{ $tabLink->label }}
            </div>
        @endif
    @endforeach
</div>
