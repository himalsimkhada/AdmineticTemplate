<?php

namespace App\Providers;

use App\Contracts\CommentRepositoryInterface;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* Repository Interface Binding */
        $this->repos();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Registering Blade Directives
        Paginator::useBootstrap();

    }

    // Repository Interface Binding
    protected function repos()
    {
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }
}
