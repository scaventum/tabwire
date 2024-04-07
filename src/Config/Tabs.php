<?php

namespace Scaventum\Wiretab\Configs;

use Illuminate\Support\Collection;
use Livewire\Wireable;
use RuntimeException;

class Tabs implements Wireable
{
    private function __construct(
        public string $id,
        public Collection $tabs,
        public ?string $activeTab,
    ) {
    }

    
    /**
     * Set active tab and return this instance
     */
    public static function make(string $id, array $tabs): static
    {
        // Validate tabs existence
        throw_if(empty($tabs), new RuntimeException('At least one Scaventum\Wiretab\Configs\Tab::class instance must exists.'));

        /**
         * Set current active tab.
         * If no active tab found, set the default to active
         */
        $tabsCollection = collect($tabs);
        $activeTab = static::getActiveTab($tabsCollection);

        return new static($id, Collection::make($tabs), $activeTab);
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
            'id' => $this->id,
            'tabs' => $this->tabs,
            'activeTab' => $this->activeTab,
        ];
    }

    public static function fromLivewire($value)
    {
        $id = $value['id'];
        $tabs = $value['tabs'];
        $activeTab = $value['activeTab'];

        return new static($id, $tabs, $activeTab);
    }
}
