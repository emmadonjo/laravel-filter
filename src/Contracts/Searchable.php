<?php

namespace Emmadonjo\LaravelFilter\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface Searchable
{
    /**
     * Search records that contain the given search term.
     * @param Builder $builder
     * @param string|null $searchTerm
     * @return Builder
     */
    public function scopeSearch(Builder $builder, ?string $searchTerm = null): Builder;

    /**
     * Specifies columns that can searched
     * @return string[]
     */
    public function searchableColumns(): array;
}