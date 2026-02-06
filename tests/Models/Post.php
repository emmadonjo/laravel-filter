<?php

declare(strict_types=1);

namespace Tests\Models;

use Emmadonjo\LaravelFilter\Concerns\HasFilter;
use Emmadonjo\LaravelFilter\Concerns\HasSearch;
use Emmadonjo\LaravelFilter\Contracts\Filterable;
use Emmadonjo\LaravelFilter\Contracts\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Filterable, Searchable
{
    use HasFilter;
    use HasSearch;

    /**
     * Summary of filterableColumns
     * @return array<int, string>
     */
    public function filterableColumns(): array
    {
        return ['slug', 'author_id', 'status'];
    }

    public function searchableColumns(): array
    {
        return [
            'title',
            'slug',
        ];
    }
}