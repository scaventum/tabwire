<?php

use Scaventum\Tabwire\Configs\Tab;

beforeEach(function () {
    $this->tab = Tab::make(id:'tab');
});

test('tab class instantiated', function () {
    expect($this->tab)->toBeInstanceOf(Tab::class);
});


test('tab has id', function () {
    expect($this->tab->id)->toBe('tab');
});

test('tab is enabled', function () {
    expect($this->tab->enabled)->toBeTrue();
});

test('tab is not enabled', function () {
    $this->tab->enable(false);

    expect($this->tab->enabled)->toBeFalse();
});

test('tab is not set as default', function () {
    expect($this->tab->default)->toBeFalse();
});

test('tab is set as default', function () {
    $this->tab->setAsDefault();

    expect($this->tab->default)->toBeTrue();
});