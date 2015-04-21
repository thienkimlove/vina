<?php namespace App\Providers;

use App\Category;
use App\Post;
use App\Question;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        /*view()->composer('frontend', function ($view) {
             $view->with('categories', Category::where('parent_id', null)->get());
        });*/
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
