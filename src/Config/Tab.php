<?php
namespace Scaventum\Wiretab\Configs;

use Livewire\Wireable;

class Tab implements Wireable
{
    public function __construct(
        public string $id,
        public ?string $label = null,
        public ?TabComponent $component = null,
        public bool $default = false,
        public bool $enabled = true,
    ) {
        $this->label ??= ucfirst($this->id);
    }

    public static function make(...$params): static
    {
        return new static(...$params);
    }

    public function setAsDefault()
    {
        $this->default = true;

        return $this;
    }

    public function enable(bool $condition = true): static
    {
        $this->enabled = $condition;

        return $this;
    }

    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'component' => $this->component,
            'default' => $this->default,
            'enabled' => $this->enabled,
        ];
    }

    public static function fromLivewire($value)
    {
        $id = $value['id'];
        $label = $value['label'];
        $component = $value['component'];
        $default = $value['default'];
        $enabled = $value['enabled'];

        return new static($id, $label, $component, $default, $enabled);
    }
}
