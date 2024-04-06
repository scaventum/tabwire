<?php

namespace Scaventum\Wiretab\Configs;

use Illuminate\Support\Collection;
use Livewire\Wireable;

class Tabs implements Wireable
{
    private function __construct(
        public Collection $tabs,
        public string $activeTab,
    ) {
    }

    /**
     * Set active tab and return this instance
     */
    public static function make(...$tabs): static
    {
        /**
         * Set current active tab.
         * If no active tab found, set the default to active
         */
        $tabsCollection = collect($tabs);
        $activeTab = static::getActiveTab($tabsCollection);

        return new static(Collection::make($tabs), $activeTab);
    }

    /**
     * Return first enabled tab that is set to default.
     * If no default tab is set, return first enabled tab.
     */
    private static function getActiveTab(Collection $tabs): string
    {
        $enabledTabs = $tabs->where('enabled', true);
        $activeTab = $enabledTabs->firstWhere('default', true) ?? $enabledTabs->first();

        return $activeTab?->id;
    }

    public function toLivewire()
    {
        return [
            'tabs' => $this->tabs,
            'activeTab' => $this->activeTab,
        ];
    }

    public static function fromLivewire($value)
    {
        $tabs = $value['tabs'];
        $activeTab = $value['activeTab'];

        return new static($tabs, $activeTab);
    }
}
