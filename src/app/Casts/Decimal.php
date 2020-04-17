<?php

namespace Ejetar\DecimalLocale\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use NumberFormatter;

class Decimal implements CastsAttributes {
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return int
     */
    public function get($model, $key, $value, $attributes) {
        return $this->convert($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param array $value
     * @param array $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes) {
        return $this->convert($value);
    }

    protected function convert($value) {
        if ($locale = app()->bound('DecimalLocale') ? app('DecimalLocale') : null)
            return ($formatter = new NumberFormatter($locale, NumberFormatter::DECIMAL))
                ->format($value);
        else
            return gettype($value) !== 'float'
                ? (float) $value
                : $value;
    }
}
