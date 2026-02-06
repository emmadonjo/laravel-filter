<?php

declare(strict_types=1);

namespace Tests;


class SearchTest extends TestCase
{
    public function test_search_columns(): void
    {
        $post_query = $this->post->scopeSearch(
            $this->post->newQuery(),
            "hello",
        );

        $this->assertEquals(
            $post_query,
            $this->post->newQuery()->where(function ($query) {
                $query->orWhere("title", "like", "%hello%")
                    ->orWhere("slug", "like", "%hello%");
            })
        );
    }

    public function test_empty_search_term(): void
    {
        $post_query = $this->post->scopeSearch(
            $this->post->newQuery(),
            ""
        );

        $this->assertEquals($post_query, $this->post->newQuery());
    }

    public function test_null_search_term(): void
    {
        $post_query = $this->post->scopeSearch(
            $this->post->newQuery(),
            null
        );

        $this->assertEquals($post_query, $this->post->newQuery());
    }

    public function test_empty_searchable_columns_method(): void
    {
        $article_query = $this->article->scopeSearch(
            $this->article->newQuery(),
            "hello"
        );

        $this->assertEquals($article_query, $this->article->newQuery());
    }

    public function test_model_with_missing_searchable_columns_method(): void
    {
        $tag_query = $this->tag->scopeSearch(
            $this->tag->newQuery(),
            'hello'
        );

        $this->assertEquals($tag_query, $this->tag->newQuery());
    }
}