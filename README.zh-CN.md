# Laravel Boost - Windsurf 扩展

<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/dt/gonetone/laravel-boost-windsurf-extension?v=1" alt="总下载量"></a>
<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/v/gonetone/laravel-boost-windsurf-extension?v=1" alt="最新稳定版本"></a>
<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/l/gonetone/laravel-boost-windsurf-extension?v=1" alt="许可证"></a>

[English](README.md) | [繁體中文](README.zh-TW.md) | 简体中文

## 简介

这是一个 Laravel Composer 包，为 [Laravel Boost](https://github.com/laravel/boost) 提供 [Windsurf](https://windsurf.com/) 集成功能。

## 系统要求

- PHP 8.1 或更高版本
- Laravel 10.0 或更高版本
- Laravel Boost 1.4 或更高版本
- [Windsurf 编辑器](https://windsurf.com/editor) 或 [Windsurf JetBrains 插件](https://plugins.jetbrains.com/plugin/20540-windsurf-plugin-formerly-codeium-for-python-js-java-go--)

## 安装方法

### 步骤 1：安装包

通过 Composer 将包安装为开发依赖项：

```bash
composer require gonetone/laravel-boost-windsurf-extension --dev
```

### 步骤 2：安装 Laravel Boost

Laravel Boost 会自动检测 Windsurf 的安装状态。运行以下命令来安装 Laravel Boost，并按照安装说明进行操作。更多信息请参阅 [Laravel Boost 文档](https://github.com/laravel/boost)。

```bash
php artisan boost:install
```

在安装过程中，系统会提示您选择环境。可用的选项会增加以下两个：

- `windsurf` - 适用于 Windsurf 编辑器
- `windsurf_jetbrains_plugin` - 适用于 Windsurf JetBrains 插件 (PhpStorm 等)

## 在项目之间切换

由于 Windsurf 仅支持全局级别的 MCP 配置文件，不支持项目级别的 MCP 配置文件，因此当您在不同的 Laravel 项目之间切换时，需要运行以下命令来更新 MCP 配置：

```bash
php artisan boost:update
```

这可确保 Windsurf 的 MCP 配置指向当前项目的正确路径。

## 许可证

Laravel Boost - Windsurf Extension 是采用 [MIT 许可证](LICENSE) 的开源软件。
