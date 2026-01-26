# Laravel Boost - Windsurf Extension

<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/dt/gonetone/laravel-boost-windsurf-extension?v=1" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/v/gonetone/laravel-boost-windsurf-extension?v=1" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/l/gonetone/laravel-boost-windsurf-extension?v=1" alt="License"></a>

English | [繁體中文](README.zh-TW.md) | [简体中文](README.zh-CN.md)

## Introduction

A Laravel Composer package that provides [Windsurf](https://windsurf.com/) integration for [Laravel Boost](https://github.com/laravel/boost).

## Requirements

- PHP 8.2 or higher
- Laravel 11.0 or higher
- Laravel Boost 2.0 or higher
- [Windsurf Editor](https://windsurf.com/editor) or [Windsurf JetBrains Plugin](https://plugins.jetbrains.com/plugin/20540-windsurf-plugin-formerly-codeium-for-python-js-java-go--)

## Installation

### Step 1: Install the Package

Install the package via Composer as a development dependency:

```bash
composer require gonetone/laravel-boost-windsurf-extension --dev
```

### Step 2: Install Laravel Boost

Laravel Boost will auto-detect the Windsurf installation automatically. Run the command below to install Laravel Boost follow the installation instructions. More information can be found in the [Laravel Boost documentation](https://github.com/laravel/boost).

```bash
php artisan boost:install
```

During installation, you will be prompted to select an AI agent. The available options will include the following two:

- `cascade` - For Windsurf Editor
- `cascade_jetbrains` - For Windsurf JetBrains Plugin (PhpStorm, etc.)

## Switching Between Projects

Since Windsurf only supports global-level MCP configuration files and does not have project-level MCP configuration files, you need to run the following command to update the MCP configuration when switching between different Laravel projects:

```bash
php artisan boost:install --no-interaction
```

This ensures that Windsurf MCP configuration points to the correct path for the current project.

## License

Laravel Boost - Windsurf Extension is open-sourced software licensed under the [MIT license](LICENSE).
