<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;

Route::get('/', 'MainController@index');
Route::get('admin', 'AdminController@index');


Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin/posts', 'PostsController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/{value}', function($value){
    if (preg_match('/([a-z0-9\-]+)\.html/', $value, $matches)) {
        $origin = $post = Post::where('slug', $matches[1])->first();
        $origin->views = $origin->views + 1;
        $origin->save();

        $relatedPosts = Post::where('category_id', $origin->category_id)
                              ->where('id', '!=', $origin->id)
                              ->latest()
                              ->limit(5)
                              ->get();
        $readPosts = Post::where('id', '!=', $origin->id)
                              ->where('views', '>', 0)
                              ->latest()
                              ->limit(5)
                              ->get();

        return view('frontend.post_details', compact('post', 'readPosts', 'relatedPosts'))->with([
            'meta_title' => $post->title. ' | Vinaquips.com',
            'meta_desc' => $post->desc,
            'meta_keywords' => ($post->tagList)? implode(',', $post->tagList) : 'vinaquip, sanpham, ',
        ]);
    }
});
