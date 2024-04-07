<?php

namespace Scaventum\Tabwire;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TabwireServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('tabwire')
            ->hasConfigFile()
            ->hasViews();
    }
}