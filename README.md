<p align="center">
<a href="https://github.com/emmadonjo/laravel-filter/actions"><img src="https://github.com/emmadonjo/laravel-filter/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/emmadonjo/laravel-filter"><img src="https://img.shields.io/packagist/dt/emmadonjo/laravel-filter" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/emmadonjo/laravel-filter"><img src="https://img.shields.io/packagist/v/emmadonjo/laravel-filter" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/emmadonjo/laravel-filter"><img src="https://img.shields.io/packagist/l/emmadonjo/laravel-filter" alt="License"></a>
</p>

Laravel Filter is a laravel package to easily add filtering to your eloquent queries.

You can add filtering capabilities to your eloquent queries:

-   Filter a single or multiple columns
-   Filter columns with list (array) of possible values

## Usage

Install via:

```php
    composer require emmadonjo/laravel-filter
```

```php

    ...

    use Emmadonjo\LaravelFilter\Contracts\Filterable;
    use Emmadonjo\LaravelFilter\Concerns\HasFilter;

    class Post extends Model implements Filterable
    {
        use HasFilter;

        public function filterableColumns(): array
        {
            return [
                'slug',
                'author_id',
                'status'
            ];
        }
    }


    // filter posts
    $filters = ['author_id' => 1, 'status' => 'published'];

    Post::filter($filters)->get();

    // filter a posts column with multiple possible values
    $filters = ['status' => ['scheduled', 'draft']];

    Post::filter($filters)->get();

    // combine both
    $filters = [
        'status' => ['scheduled', 'draft'],
        'author_id' => 1
    ];

    Post::filter($filters)->get();
```

## Changelog

Kindly see the [releases](https://github.com/emmadonjo/laravel-filter/releases) for more information on what has changed recently.

## Contributing

Pull requests are highly welcomed. Ensure you follow the PSR coding standards and meet static analysis level of 9.

## License

The MIT License (MIT). Please see [LICENSE](https://github.com/emmadonjo/laravel-filter/blob/master/LICENSE.md) for details.
