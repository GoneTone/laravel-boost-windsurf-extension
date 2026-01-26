# Laravel Boost - Windsurf 擴充套件

<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/dt/gonetone/laravel-boost-windsurf-extension?v=1" alt="總下載次數"></a>
<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/v/gonetone/laravel-boost-windsurf-extension?v=1" alt="最新穩定版本"></a>
<a href="https://packagist.org/packages/gonetone/laravel-boost-windsurf-extension"><img src="https://img.shields.io/packagist/l/gonetone/laravel-boost-windsurf-extension?v=1" alt="授權條款"></a>

[English](README.md) | 繁體中文 | [简体中文](README.zh-CN.md)

## 簡介

這是一個 Laravel Composer 套件，為 [Laravel Boost](https://github.com/laravel/boost) 提供 [Windsurf](https://windsurf.com/) 整合功能。

## 系統需求

- PHP 8.2 或更高版本
- Laravel 11.0 或更高版本
- Laravel Boost 2.0 或更高版本
- [Windsurf 編輯器](https://windsurf.com/editor) 或 [Windsurf JetBrains 外掛程式](https://plugins.jetbrains.com/plugin/20540-windsurf-plugin-formerly-codeium-for-python-js-java-go--)

## 安裝方式

### 步驟 1：安裝套件

透過 Composer 將套件安裝為開發依賴項目：

```bash
composer require gonetone/laravel-boost-windsurf-extension --dev
```

### 步驟 2：安裝 Laravel Boost

Laravel Boost 會自動偵測 Windsurf 的安裝狀態。執行以下指令來安裝 Laravel Boost，並依照安裝說明進行操作。更多資訊請參閱 [Laravel Boost 文件](https://github.com/laravel/boost)。

```bash
php artisan boost:install
```

在安裝過程中，系統會提示您選擇 AI 代理。可用的選項會增加以下兩個：

- `cascade` - 適用於 Windsurf 編輯器
- `cascade_jetbrains` - 適用於 Windsurf JetBrains 延伸模組 (PhpStorm 等)

## 在專案之間切換

由於 Windsurf 僅支援全域層級的 MCP 設定檔，並不支援專案層級的 MCP 設定檔，因此當您在不同的 Laravel 專案之間切換時，需要執行以下指令來更新 MCP 設定：

```bash
php artisan boost:install --no-interaction
```

這可確保 Windsurf 的 MCP 設定指向目前專案的正確路徑。

## 授權條款

Laravel Boost - Windsurf Extension 是採用 [MIT 授權條款](LICENSE) 的開源軟體。
