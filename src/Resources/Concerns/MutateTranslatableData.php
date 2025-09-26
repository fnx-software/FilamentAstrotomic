<?php

namespace Fnxsoftware\FilamentAstrotomic\Resources\Concerns;

use Illuminate\Database\Eloquent\Model;

trait MutateTranslatableData
{
    public static function mutateTranslatableData(Model $record, array $data = []): array
    {
        if (! method_exists($record, 'getTranslationsArray')) {
            return $data;
        }

        foreach ($record->getTranslationsArray() as $locale => $attributes) {
            $data[$locale] = $attributes;
        }

        return $data;
    }
}
