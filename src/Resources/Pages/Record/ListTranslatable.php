<?php

namespace Fnxsoftware\FilamentAstrotomic\Resources\Pages\Record;

use Fnxsoftware\FilamentAstrotomic\Resources\Concerns\HasLocales;
use Filament\Resources\Pages\ListRecords;

/**
 * @mixin ListRecords
 */
trait ListTranslatable
{
    use HasLocales;
}
