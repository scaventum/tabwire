# tabwire

Laravel Livewire package which enables adding dynamic and conditional tabs within any Livewire component.

## Installation

`composer require scaventum\tabwire`

## Basic usage

- On any Livewire Component class, add `HasTabs` trait and tabs configuration in `mount()` method.

  ```php
  <?php

  namespace App\Livewire;

  use App\Models\User;
  use Livewire\Component;
  use Scaventum\Tabwire\Configs\Tab;
  use Scaventum\Tabwire\Configs\TabComponent;
  use Scaventum\Tabwire\Configs\Tabs;
  use Scaventum\Tabwire\Traits\HasTabs;

  ...

  class ShowUser extends Component
  {
    use HasTabs;

    ...

    public Tabs $tabs;

    public function mount(User $user)
    {
        $this->tabs = Tabs::make(
            id: 'show-user-tabs',
            tabs: [
                Tab::make(
                    id: 'user-detail',
                    component: TabComponent::make(
                        // Any Livewire Component name
                        is: 'users.detail-form',
                        // Any props for the Livewire Component
                        props: [
                            'mode' => 'edit',
                            'user' => $user->id,
                        ]
                    )
                ),
                Tab::make(
                    id: 'user-permission',
                    component: TabComponent::make(
                        // Any Livewire Component name
                        is: 'users.permission-form',
                        // Any props for the Livewire Component
                        props: [
                            'user' => $user->id,
                        ]
                    )
                ),
                Tab::make(
                  id: 'user-faq',
                    component: TabComponent::make(
                        // Any Livewire Component name
                        is: 'users.faq',
                    )
                ),
            ],
        );
    }
    ...

  }
  ```

- On its Livewire view file, include these blade views:

  ```html
  <!-- Render tabs links -->
  <div>@include('tabwire::components.links', ['tabs' => $tabs])</div>

  <!-- Render tabs content -->
  <div>@include('tabwire::components.content', ['tabs' => $tabs])</div>
  ```

  Tabs links and content can be placed on any element you want in the view file.

## Options

- Set any tab as default:

  ```php
   Tab::make(id: 'detail')->setAsDefault(),
  ```

- Enable any tab based on condition:
  ```php
   Tab::make(id: 'detail')->enable(request()->user->isAdmin),
  ```

## Advance usage

- Multiple tabs in a Livewire Component:

  - On any Livewire Component class, declare multiple properties of Tabs:

    ```php
    public Tabs $upperTabs;

    public Tabs $lowerTabs;

    public function mount(User $user)
    {
      // Assign unique ids for each Tabs instance.
      $this->upperTabs = Tabs::make(id: 'upper-tabs', ...);
      $this->lowerTabs = Tabs::make(id: 'lower-tabs', ...);
    }
    ```

  - On its Livewire view file, include multiple of these blade views:

    ```html
    <!-- Render tabs links and content of upper tabs-->
    <div>@include('tabwire::components.links', ['tabs' => $upperTabs])</div>
    <div>@include('tabwire::components.content', ['tabs' => $upperTabs])</div>

    ...

    <!-- Render tabs links and content of lower tabs-->
    <div>@include('tabwire::components.links', ['tabs' => $lowerTabs])</div>
    <div>@include('tabwire::components.content', ['tabs' => $lowerTabs])</div>
    ```

## License

[The MIT License (MIT)](/LICENSE)
