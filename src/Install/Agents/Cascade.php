<?php

declare(strict_types=1);

namespace GoneTone\LaravelBoostWindsurf\Install\Agents;

use Laravel\Boost\Contracts\SupportsGuidelines;
use Laravel\Boost\Contracts\SupportsMcp;
use Laravel\Boost\Contracts\SupportsSkills;
use Laravel\Boost\Install\Agents\Agent;
use Laravel\Boost\Install\Enums\Platform;

class Cascade extends Agent implements SupportsGuidelines, SupportsMcp, SupportsSkills
{
    public function name(): string
    {
        return 'cascade';
    }

    public function displayName(): string
    {
        return 'Cascade';
    }

    public function useAbsolutePathForMcp(): bool
    {
        return true;
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

    public function httpMcpServerConfig(string $url): array
    {
        return [
            'serverUrl' => $url,
        ];
    }

    public function guidelinesPath(): string
    {
        return 'AGENTS.md';
    }

    public function skillsPath(): string
    {
        return '.agents/skills';
    }
}
