<?php

use Scaventum\Tabwire\Configs\Tab;
use Scaventum\Tabwire\Configs\Tabs;

beforeEach(function () {
    $this->tabs = Tabs::make(id: 'tabs', tabs: [
        Tab::make(id: 'tab-1'),
        Tab::make(id: 'tab-2'),
    ]);
});

it('returns runtime exception when no tabs defined during instance making', function () {
    $this->emptyTabs = Tabs::make(id: 'tabs', tabs: []);
})->throws(RuntimeException::class, 'At least one Scaventum\Tabwire\Configs\Tab::class instance must exists.');

it('sets first tab as default when no tab is set to default', function () {
    expect($this->tabs->activeTab)->toBe('tab-1');
});
