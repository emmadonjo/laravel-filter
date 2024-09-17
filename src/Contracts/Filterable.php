<?php

declare(strict_types=1);

namespace Emmadonjo\LaravelFilter;

use Illuminate\Contracts\Database\Query\Builder;

interface Filterable
{
    /**
     * Apply filters to the given query
     * @param \Illuminate\Contracts\Database\Query\Builder $builder
     * @param array $filters
     * @return \Illuminate\Contracts\Database\Query\Builder
     */
    public function scopeFilter(Builder $builder, array $filters): Builder;
}