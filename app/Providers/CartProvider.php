<?php

namespace App\Providers;

use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class CartProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('cart', function($app)
        {
            $storage = new DBStorageController();
            $events = $app['events'];
            $instanceName = 'cart';
            $session_key = Auth::user()->id();
            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });
    }
}
