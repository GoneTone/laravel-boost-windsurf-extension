<?php

declare(strict_types=1);

namespace GoneTone\LaravelBoostWindsurf;

use GoneTone\LaravelBoostWindsurf\Install\Agents\Cascade;
use GoneTone\LaravelBoostWindsurf\Install\Agents\CascadeJetBrains;
use Illuminate\Support\ServiceProvider;
use Laravel\Boost\Boost;

class WindsurfServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Boost::registerAgent('cascade', Cascade::class);
        Boost::registerAgent('cascade_jetbrains', CascadeJetBrains::class);
    }
}
