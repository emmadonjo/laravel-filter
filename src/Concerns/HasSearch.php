<?php

namespace Emmadonjo\LaravelFilter\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait HasSearch
{
    /**
     * Search records that contain the given search term.
     * @param Builder<covariant Model> $builder
     * @param string|null $searchTerm
     * @return Builder<covariant Model>
     */
    public function scopeSearch(Builder $builder, ?string $searchTerm = null): Builder
    {
        if (empty($searchTerm) || !method_exists($this, 'searchableColumns')) {
            return $builder;
        }

        $searchableColumns = $this->searchableColumns();
        $term = "%{$searchTerm}%";

        $builder->where(function (Builder $builder) use ($searchableColumns, $term) {
            foreach ($searchableColumns as $column) {
                $builder->orWhere($column, 'like', $term);
            }
        });

        return $builder;
    }
}