<?php

namespace Tests\Models;

use Emmadonjo\LaravelFilter\Concerns\HasFilter;
use Emmadonjo\LaravelFilter\Concerns\HasSearch;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFilter;
    use HasSearch;
}