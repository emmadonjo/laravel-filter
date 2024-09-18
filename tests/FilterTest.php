<?php

declare(strict_types=1);

namespace Tests;

use Tests\TestCase;
use Tests\Mocks\Post;

class FilterTest extends TestCase
{
    
    public function test_empty_filters(): void
    {
        $post_query = $this->post->scopeFilter(
            $this->post->newQuery(),
            []
        );

        $this->assertEquals($post_query, $this->post->newQuery());
    }

    public function test_missing_filterable_columns_method(): void
    {
        $article_query = $this->article->scopeFilter(
            $this->article->newQuery(),
            ['status' => 'published']
        );

        $this->assertEquals($article_query, $this->article->newQuery());
    }

    public function test_empty_strings(): void
    {
        $post_query = $this->post->scopeFilter(
            $this->post->newQuery(),
            ['slug' => '', 'status' => '']
        );

        $this->assertEquals($post_query, $this->post->newQuery());
    }

    public function test_skip_columns_not_filterable(): void
    {
        $post_query = $this->post->scopeFilter(
            $this->post->newQuery(),
            ['is_pillar_content' => false, 'is_premium' => true]
        );

        $this->assertEquals($post_query, $this->post->newQuery());
    }

    public function test_skip_columns_with_null_filter_values(): void
    {
        $post_query = $this->post->scopeFilter(
            $this->post->newQuery(),
            ['status' => null, 'slug' => null]
        );

        $this->assertEquals($post_query, $this->post->newQuery());
    }

    public function test_filter_column_with_list_of_values(): void
    {
        $post_query = $this->post->scopeFilter(
            $this->post->newQuery(),
            ['status' => ['published', 'scheduled']]
        );

        $this->assertEquals(
            $post_query, $this->post->newQuery()
                ->whereIn('status', ['published', 'scheduled'])
        );
    }

    public function test_filter_column(): void
    {
        $post_query = $this->post->scopeFilter(
            $this->post->newQuery(),
            ['status' => 'draft']
        );

        $this->assertEquals(
            $post_query, $this->post->newQuery()
                ->where('status', 'draft')
        );
    }

    public function test_filter_column_with_single_and_list_of_values(): void
    {
        $post_query = $this->post->scopeFilter(
            $this->post->newQuery(),
            ['status' => ['scheduled', 'draft'], 'author_id' => 1]
        );

        $this->assertEquals(
            $post_query, $this->post->newQuery()
                ->whereIn('status', ['scheduled', 'draft'])
                ->where('author_id', 1)
        );
    }
}