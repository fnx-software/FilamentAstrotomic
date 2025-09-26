<?php

namespace Fnxsoftware\FilamentAstrotomic\Resources\Pages\Record;

use Filament\Resources\Pages\ListRecords;
use Fnxsoftware\FilamentAstrotomic\Resources\Concerns\HasLocales;

/**
 * @mixin ListRecords
 */
trait ListTranslatable
{
    use HasLocales;
}
