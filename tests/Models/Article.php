<?php

declare(strict_types=1);

namespace Tests\Models;
use Emmadonjo\LaravelFilter\Concerns\HasFilter;
use Emmadonjo\LaravelFilter\Concerns\HasSearch;
use Emmadonjo\LaravelFilter\Contracts\Searchable;
use Illuminate\Database\Eloquent\Model;
use Emmadonjo\LaravelFilter\Contracts\Filterable;

class Article extends Model implements Filterable, Searchable
{
    use HasFilter;
    use HasSearch;

    public function filterableColumns(): array
    {
        return [];
    }

    public function searchableColumns(): array
    {
        return [];
    }
}