<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Post;
use App\Tag;


class MainController extends Controller
{

    public function index()
    {
        $features = Post::feature()->latest()->limit(3)->get();
        $categories =  Category::whereNotNull('parent_id')->get();
        return view('frontend.index', compact('categories', 'features'));
    }

    public function tag($keyword)
    {
        $tag = Tag::where('slug', $keyword)->first();
        $posts = $tag->posts();
        return view('frontend.search', compact('posts', 'keyword'))->with([
            'meta_title' => ' Các bài viết với nhãn '.$keyword.' tại Viemgan.com.vn ',
            'meta_desc' => '',
            'meta_keywords' => $keyword,
        ]);
    }


}
