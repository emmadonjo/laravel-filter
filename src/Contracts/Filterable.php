<?php

declare(strict_types=1);

namespace Emmadonjo\LaravelFilter\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


interface Filterable
{
    /**
     * Apply filters to the given query
     * @param Builder<Model> $builder
     * @param array<string, string|int|bool|float|array<int, mixed>|null> $filters
     * @return Builder<Model>
     */
    public function scopeFilter(Builder $builder, array $filters): Builder;
}