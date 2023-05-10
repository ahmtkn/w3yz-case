<?php

namespace App\Providers;

use App\Repositories\Abstractions\CategoryRepository;
use App\Repositories\Abstractions\PostRepository;
use App\Repositories\Concretes\CategoryRepositoryElequent;
use App\Repositories\Concretes\PostRepositoryElequent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepository::class, PostRepositoryElequent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryElequent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
