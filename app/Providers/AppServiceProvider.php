<?php

namespace App\Providers;

use App\Interface\ProductRepositoryInterface;
use App\Repository\ProductRepository;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('success', function ($data, $status = 200) {
            return Response::json([
              'errors'  => false,
              'data' => $data,
            ], $status);
        });

        Response::macro('error', function ($message, $status = 400) {
            return Response::json([
              'errors'  => true,
              'message' => $message,
            ], $status);
        });
    }
}
