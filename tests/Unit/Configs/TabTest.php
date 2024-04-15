<?php

use Scaventum\Tabwire\Configs\Tab;

beforeEach(function () {
    $this->tab = Tab::make(id: 'tab');
});

it('instantiates tab class', function () {
    expect($this->tab)->toBeInstanceOf(Tab::class);
});

it('returns tab id', function () {
    expect($this->tab->id)->toBe('tab');
});

it('returns tab enabled as true', function () {
    expect($this->tab->enabled)->toBeTrue();
});

it('sets tab as disabled', function () {
    $this->tab->enable(false);

    expect($this->tab->enabled)->toBeFalse();
});

it('returns tab default as false', function () {
    expect($this->tab->default)->toBeFalse();
});

it('sets tab as default', function () {
    $this->tab->setAsDefault();

    expect($this->tab->default)->toBeTrue();
});
