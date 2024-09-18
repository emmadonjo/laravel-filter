<?php

declare(strict_types=1);

namespace Tests\Models;
use Emmadonjo\LaravelFilter\Concerns\HasFilter;
use Illuminate\Database\Eloquent\Model;
use Emmadonjo\LaravelFilter\Contracts\Filterable;

class Article extends Model implements Filterable
{
    use HasFilter;
}