<?php

namespace App\Providers;

use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['frontend.includes.header','frontend.index','frontend.subcategory'], function ($view) {

            $categories = Category::where('status',1)->orderby('rank')->get();
            $view->with('categories', $categories);

        });

        View::composer(['frontend.index'], function ($view) {
            $products = Product::where([
                ['status', '=', 1],
                ['feature_key', '=', 1]
            ])->get();
            $view->with('products', $products);

        });

        View::composer('frontend.includes.footer', function ($view) {
            $tags = Tag::where('status',1)->orderby('name')->get();
            $view->with('tags', $tags);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
