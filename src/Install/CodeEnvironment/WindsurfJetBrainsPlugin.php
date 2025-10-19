<?php

declare(strict_types=1);

namespace GoneTone\LaravelBoostWindsurf\Install\CodeEnvironment;

use Laravel\Boost\Contracts\Agent;
use Laravel\Boost\Contracts\McpClient;
use Laravel\Boost\Install\CodeEnvironment\CodeEnvironment;
use Laravel\Boost\Install\Enums\Platform;

class WindsurfJetBrainsPlugin extends CodeEnvironment implements Agent, McpClient
{
    public bool $useAbsolutePathForMcp = true;

    public function name(): string
    {
        return 'windsurf_jetbrains_plugin';
    }

    public function displayName(): string
    {
        return 'Windsurf (JetBrains Plugin)';
    }

    public function agentName(): string
    {
        return 'Cascade (JetBrains)';
    }

    public function systemDetectionConfig(Platform $platform): array
    {
        return match ($platform) {
            Platform::Darwin => [
                'paths' => ['/Applications/PhpStorm.app'],
            ],
            Platform::Linux => [
                'paths' => [
                    '/opt/phpstorm',
                    '/opt/PhpStorm*',
                    '/usr/local/bin/phpstorm',
                    '~/.local/share/JetBrains/Toolbox/apps/PhpStorm/ch-*',
                ],
            ],
            Platform::Windows => [
                'paths' => [
                    '%ProgramFiles%\\JetBrains\\PhpStorm*',
                    '%LOCALAPPDATA%\\JetBrains\\Toolbox\\apps\\PhpStorm\\ch-*',
                    '%LOCALAPPDATA%\\Programs\\PhpStorm',
                ],
            ],
        };
    }

    public function projectDetectionConfig(): array
    {
        return [
            'paths' => ['.windsurf'],
            'files' => ['.windsurfrules'],
        ];
    }

    public function mcpConfigPath(): string
    {
        $home = getenv('HOME') ?: getenv('USERPROFILE');

        // Windsurf only has a global MCP configuration file, so the absolute path must be obtained.
        return $home.DIRECTORY_SEPARATOR.'.codeium'.DIRECTORY_SEPARATOR.'mcp_config.json';
    }

    public function guidelinesPath(): string
    {
        return '.windsurfrules';
    }
}
