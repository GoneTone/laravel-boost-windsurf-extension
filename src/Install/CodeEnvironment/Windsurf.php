<?php

declare(strict_types=1);

namespace GoneTone\LaravelBoostWindsurf\Install\CodeEnvironment;

use Laravel\Boost\Contracts\Agent;
use Laravel\Boost\Contracts\McpClient;
use Laravel\Boost\Install\CodeEnvironment\CodeEnvironment;
use Laravel\Boost\Install\Enums\Platform;

class Windsurf extends CodeEnvironment implements Agent, McpClient
{
    public bool $useAbsolutePathForMcp = true;

    public function name(): string
    {
        return 'windsurf';
    }

    public function displayName(): string
    {
        return 'Windsurf';
    }

    public function agentName(): string
    {
        return 'Cascade';
    }

    public function systemDetectionConfig(Platform $platform): array
    {
        return match ($platform) {
            Platform::Darwin => [
                'paths' => ['/Applications/Windsurf.app'],
            ],
            Platform::Linux => [
                'paths' => [
                    '/opt/windsurf',
                    '/usr/local/bin/windsurf',
                    '~/.local/bin/windsurf',
                ],
            ],
            Platform::Windows => [
                'paths' => [
                    '%ProgramFiles%\\Windsurf',
                    '%LOCALAPPDATA%\\Programs\\Windsurf',
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
        return $home.DIRECTORY_SEPARATOR.'.codeium'.DIRECTORY_SEPARATOR.'windsurf'.DIRECTORY_SEPARATOR.'mcp_config.json';
    }

    public function guidelinesPath(): string
    {
        return '.windsurfrules';
    }
}
