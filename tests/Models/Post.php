<?php

declare(strict_types=1);

namespace Tests\Models;

use Emmadonjo\LaravelFilter\Concerns\HasFilter;
use Emmadonjo\LaravelFilter\Contracts\Filterable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Filterable
{
    use HasFilter;

    /**
     * Summary of filterableColumns
     * @return array<int, string>
     */
    public function filterableColumns(): array
    {
        return ['slug', 'author_id', 'status'];
    }
}