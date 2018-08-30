<?php
namespace Zacksmash\LaravelPreset;

use Artisan;
use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset as BasePreset;

class Preset extends BasePreset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install($withAuth = false)
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateScss();
        static::updateWebpackConfiguration();
        static::updateJavaScript();
        static::updateTemplates();
        static::removeNodeModules();
        static::updateGitignore();
        static::updateEditorConfig();
    }

    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function updateGitignore()
    {
        copy(__DIR__.'/stubs/gitignore', base_path('.gitignore'));
    }

    protected static function updateEditorConfig()
    {
        copy(__DIR__.'/stubs/editorconfig', base_path('.editorconfig'));
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
          'browser-sync' => '^2.23.6',
          'browser-sync-webpack-plugin' => '^2.0.1',
          'foundation-sites' => '^6.4.4-rc1',
          'jquery' => '^3.2',
          'motion-ui' => '^1.2.3',
        ], Arr::except($packages, [
            'bootstrap',
            'bootstrap-sass',
            'popper.js',
        ]));
    }

    protected static function updateScss()
    {
        (new Filesystem)->deleteDirectory(resource_path('sass'));
        (new Filesystem)->copyDirectory(__DIR__.'/stubs/scss', resource_path('scss'));
    }

    protected static function updateJavaScript()
    {
        copy(__DIR__.'/stubs/js/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/stubs/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__.'/stubs/js/foundation.js', resource_path('js/foundation.js'));
    }

    protected static function updateTemplates()
    {
        // remove default welcome page
        // (new Filesystem)->delete(
        //     resource_path('views/welcome.blade.php')
        // );

        // Copy Zurb Foundation Auth view templates
        (new Filesystem)->copyDirectory(__DIR__.'/stubs/views', resource_path('views'));
    }
}
