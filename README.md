<p>
<a href="https://github.com/emmadonjo/laravel-filter/actions"><img src="https://github.com/emmadonjo/laravel-filter/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/emmadonjo/laravel-filter"><img src="https://img.shields.io/packagist/dt/emmadonjo/laravel-filter" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/emmadonjo/laravel-filter"><img src="https://img.shields.io/packagist/v/emmadonjo/laravel-filter" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/emmadonjo/laravel-filter"><img src="https://img.shields.io/packagist/l/emmadonjo/laravel-filter" alt="License"></a>
</p>

Laravel Filter is a laravel package to easily add filtering and search capabilities to your eloquent queries.
## Installation
Install via composer:

```php
    composer require emmadonjo/laravel-filter
```

## Usage

### Filtering
You can:

-   Filter single or multiple columns
-   Filter columns with list (array) of possible values

To filter,
- use the `HasFilter` trait
- define a `filterableColumns()` method that returns an array of columns that can be filtered
- optionally, implement `Filterable` interface
- in your queries, use the `filter($filters)` method to filter records

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

    // filter a post's column with multiple possible values
    $filters = ['status' => ['scheduled', 'draft']];

    Post::filter($filters)->get();

    // combine both
    $filters = [
        'status' => ['scheduled', 'draft'],
        'author_id' => 1
    ];

    Post::filter($filters)->get();
```

### Searching
To search,
- use the `HasSearch` trait
- define a `searchableColumns()` method that returns an array of columns that can be searched
- optionally, implement `Searchble` interface
- in your queries, use the `search($searchTerm)` method to search records

**Performance**
- For large records or columns with large values, it's advisable to use a service/package that supports fulltext search, for example, Elasticsearch. 

- Indexing searching columns (where necessary) will help improve performance, but this should be carefully done.

```php

    ...

    use Emmadonjo\LaravelFilter\Contracts\Searchable;
    use Emmadonjo\LaravelFilter\Concerns\HasSearch;

    class Post extends Model implements Searchable
    {
        use HasSearch;

        public function searchableColumns(): array
        {
            return [
                'slug',
                'content',
            ];
        }
    }

    $searchTerm = "hello"

    Post::search($searchTerm)->get();
```

### Filtering and Searching

To filter & search,
- use the `HasFilter` and `HasSearch` traits
- define a `filterableColumns()` and `searchableColumns` methods that return arrays of columns that can be filtered or searched respectively
- optionally, implement `Filterable` and, or `Searchable` interfaces
- in your queries, use the `filter($filters)` and `search($searchTerm)` methods to filter and search records

```php

    ...

    use Emmadonjo\LaravelFilter\Contracts\Filterable;
    use Emmadonjo\LaravelFilter\Contracts\Searchable
    use Emmadonjo\LaravelFilter\Concerns\HasFilter;
    use Emmadonjo\LaravelFilter\Concerns\HasSearch;

    class Post extends Model implements Filterable, Searchable
    {
        use HasFilter;
        use HasSearch

        public function filterableColumns(): array
        {
            return [
                'slug',
                'author_id',
                'status',
            ];
        }
        
        public function searchableColumns() : array
        {
             return [
                 'title',
                 'content',
            ]
        }
    }


    $filters = ['author_id' => 1, 'status' => 'published'];

    Post::filter($filters)
        ->search("hello")
        ->get();

    // filter a post's column with multiple possible values while applying search
    $filters = ['status' => ['scheduled', 'draft']];

    Post::search('hello')
        ->filter($filters)
        ->get();
```

## Changelog

Kindly see the [releases](https://github.com/emmadonjo/laravel-filter/releases) for more information on what has changed recently.

## Contributing

Pull requests are highly welcomed. Ensure you follow the PSR coding standards and meet static analysis level of 9.

## License

The MIT License (MIT). Please see [LICENSE](https://github.com/emmadonjo/laravel-filter/blob/master/LICENSE.md) for details.
