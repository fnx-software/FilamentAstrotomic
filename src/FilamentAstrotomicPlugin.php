<?php

namespace Fnxsoftware\FilamentAstrotomic;

use Astrotomic\Translatable\Locales;
use Closure;
use Exception;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Str;
use Throwable;

class FilamentAstrotomicPlugin implements Plugin
{
    protected ?Closure $getLocaleLabelUsing = null;

    final public function __construct() {}

    public function getId(): string
    {
        return 'filament-astrotomic';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    /**
     * @throws Throwable
     */
    public function allLocales(): \Illuminate\Support\HigherOrderTapProxy
    {
        return tap(app(Locales::class)->all(), function (array $locales) {
            foreach ($locales as $locale) {
                throw_if(! is_string($locale), new Exception('Sorry, but the locales must be strings.'));
            }
        });
    }

    public function getMailLocale(): string
    {
        return app(Locales::class)->current();
    }

    public function getLocaleLabelUsing(?Closure $callback): static
    {
        $this->getLocaleLabelUsing = $callback;

        return $this;
    }

    public function getLocaleLabel(string $locale, ?string $displayLocale = null): ?string
    {
        $displayLocale ??= app()->getLocale();

        $label = null;

        if ($callback = $this->getLocaleLabelUsing) {
            $label = $callback($locale, $displayLocale);
        }

        return $label ?? Str::ucfirst(locale_get_display_name($locale, $displayLocale) ?: '');
    }
}
