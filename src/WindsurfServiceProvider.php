<?php

declare(strict_types=1);

namespace GoneTone\LaravelBoostWindsurf;

use GoneTone\LaravelBoostWindsurf\Install\CodeEnvironment\Windsurf;
use GoneTone\LaravelBoostWindsurf\Install\CodeEnvironment\WindsurfJetBrainsPlugin;
use Illuminate\Support\ServiceProvider;
use Laravel\Boost\Boost;

class WindsurfServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Boost::registerCodeEnvironment('windsurf', Windsurf::class);
        Boost::registerCodeEnvironment('windsurf_jetbrains_plugin', WindsurfJetBrainsPlugin::class);
    }
}
