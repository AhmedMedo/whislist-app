<?php

namespace App\Providers;

use App\Repository\Interfaces\ItemRepositoryInterface;
use App\Repository\ItemRepository;
use App\Services\Interfaces\ItemServiceInterface;
use App\Services\ItemService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ItemRepositoryInterface::class,ItemRepository::class);
        $this->app->bind(ItemServiceInterface::class,ItemService::class);
    }


    public function boot(): void
    {
        Paginator::useBootstrap();
    }

}
