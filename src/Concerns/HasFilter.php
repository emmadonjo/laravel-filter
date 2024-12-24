<?php

declare(strict_types=1);

namespace Emmadonjo\LaravelFilter\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    /**
     * Apply filters to the given query
     * @param Builder<covariant Model> $builder
     * @param array<string, string|int|bool|float|array<int, mixed>|null> $filters
     * @return Builder<covariant Model>
     */
    public function scopeFilter(Builder $builder, array $filters): Builder
    {
        if (empty($filters) || !method_exists($this, 'filterableColumns')) {
            return $builder;
        }

        $columns = $this->filterableColumns();

        if (empty($columns) || !is_array($columns)) {
            return $builder;
        }

        foreach ($filters as $column => $value) {
            if (($value === '') || ($value === null)) {
                continue;
            }

            if (!in_array($column, $columns)) {
                continue;
            }

            if (is_array($value)) {
                $builder->whereIn($column, $value);
            }

            else {
                $builder->where($column, $value);
            }
        }

        return $builder;
    }
}