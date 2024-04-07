@php
    // Get first active tab from tabs collection
    $activeTab = $tabs->tabs->first(function ($tab) use ($tabs) {
        return $tab->id === $tabs->activeTab;
    });
@endphp

<div>
    @if ($activeTab?->component)
        @livewire($activeTab->component->is, $activeTab->component->props, key($activeTab->id))
    @else
        {{ $activeTab?->label }}
    @endif
</div>
