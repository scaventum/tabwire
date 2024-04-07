<?php

namespace Scaventum\Tabwire\Configs;

use Livewire\Wireable;

class TabComponent implements Wireable
{
    public function __construct(
        public string $is,
        public array $props,
    ) {
    }

    public static function make(string $is, array $props = []): static
    {
        return new static($is, $props);
    }

    public function toLivewire()
    {
        return [
            'is' => $this->is,
            'props' => $this->props,
        ];
    }

    public static function fromLivewire($value)
    {
        $is = $value['is'];
        $props = $value['props'];

        return new static($is, $props);
    }
}
