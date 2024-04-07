<?php

namespace Scaventum\Wiretab\Traits;

use Scaventum\Wiretab\Configs\Tabs;

trait HasTabs
{
    /**
     * Switch tab with provided tabId and tab argument.
     */
    public function switchTab(string $tabId, string $activeTab)
    {
        // Collect instance properties
        $properties = collect(get_object_vars($this));

        foreach ($properties as $propertyName => $property) {
            if ($property instanceof (Tabs::class) && $property->id === $tabId) {

                $this->{$propertyName}->activeTab = $activeTab;
            }
        }
    }
}
