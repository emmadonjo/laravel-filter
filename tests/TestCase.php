<?php

declare(strict_types=1);

namespace Tests;


use Tests\Models\Post;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tests\Models\Article;

abstract class TestCase extends BaseTestCase
{

    protected Post $post;
    protected Article $article;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();

        $this->setUpModels();
    }
    
    protected function setUpDatabase(): void    
    {
        config(['database.default' => 'testbench']);

        config(['database.connections.testbench' => [
                'driver'   => 'sqlite',
                'database' => ':memory:',
                'prefix'   => '',
            ],
        ]);
    }

    protected function setUpModels(): void
    {
        $this->post = new Post();
        $this->article = new Article();
    }
}