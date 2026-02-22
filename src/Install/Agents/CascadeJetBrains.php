<?php

declare(strict_types=1);

namespace GoneTone\LaravelBoostWindsurf\Install\Agents;

use Illuminate\Support\Facades\Config;
use Laravel\Boost\Contracts\SupportsGuidelines;
use Laravel\Boost\Contracts\SupportsMcp;
use Laravel\Boost\Contracts\SupportsSkills;
use Laravel\Boost\Install\Agents\Agent;
use Laravel\Boost\Install\Enums\Platform;

class CascadeJetBrains extends Agent implements SupportsGuidelines, SupportsMcp, SupportsSkills
{
    public function name(): string
    {
        return 'cascade_jetbrains';
    }

    public function displayName(): string
    {
        return 'Cascade (JetBrains)';
    }

    public function useAbsolutePathForMcp(): bool
    {
        return true;
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

    public function httpMcpServerConfig(string $url): array
    {
        return [
            'serverUrl' => $url,
        ];
    }

    public function guidelinesPath(): string
    {
        return Config::get('boost.agents.cascade_jetbrains.guidelines_path', 'AGENTS.md');
    }

    public function skillsPath(): string
    {
        return Config::get('boost.agents.cascade_jetbrains.skills_path', '.agents/skills');
    }
}
