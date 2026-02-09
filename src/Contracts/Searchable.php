<?php

namespace Emmadonjo\LaravelFilter\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface Searchable
{
    /**
     * Search records that contain the given search term.
     * @param Builder<covariant Model> $builder
     * @param string|null $searchTerm
     * @return Builder<covariant Model>
     */
    public function scopeSearch(Builder $builder, ?string $searchTerm = null): Builder;

    /**
     * Specifies columns that can searched
     * @return string[]
     */
    public function searchableColumns(): array;
}