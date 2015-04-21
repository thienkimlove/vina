<?php namespace App\Repositories;

use App\Category;
use App\Post;
use App\Tag;
use Intervention\Image\ImageManager;

class PostRepository extends BaseRepository
{
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * list all category which do not have child categories.
     * @return array
     */
    public function create()
    {
        $tags = Tag::all()->lists('name', 'name');
        $categories = $this->getCategoriesList();
        return compact('categories', 'tags');
    }

    public function store($request)
    {
        $post = $this->model->create([
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'content' => $request->input('content'),
            'avatar' => ($request->file('avatar') && $request->file('avatar')->isValid()) ? $this->saveImage($request->file('avatar')) : 'post.png',
            'category_id' => $request->input('category_id'),
            'homepage' => ($request->input('homepage') == 'on') ? true : false,
            'feature' => ($request->input('feature') == 'on') ? true : false,
        ]);
        $this->syncTags($post, $request);
        return $post;
    }


    /**
     * get data for edit
     * @param $id
     * @return array
     */
    public function edit($id)
    {
        $tags = Tag::all()->lists('name', 'name');
        $post = $this->getById($id);
        $categories = $this->getCategoriesList();
        return compact('post', 'categories', 'tags');
    }

    public function update($request, $id)
    {
        $post = $this->getById($id);
        $update = $request->all();

        $update['homepage'] = (!empty($update['homepage']) && $update['homepage'] == 'on') ? true : false;
        $update['feature'] = (!empty($update['feature']) && $update['feature'] == 'on') ? true : false;

        if ($request->file('avatar') && $request->file('avatar')->isValid()) {
            $update['avatar'] = $this->saveImage($request->file('avatar'), $post->avatar);
        }
        $post->update($update);
        $this->syncTags($post, $request);

        return $post;
    }

    protected function syncTags(Post $post, $request)
    {
        $tagIds = [];
        foreach ($request->input('tag_list') as $tag) {
            $tagIds[] = Tag::firstOrCreate(['name' => $tag])->id;
        }
        $post->tags()->sync($tagIds);
    }

    /**
     * @return array
     */
    protected function getCategoriesList()
    {
        $categories = Category::all()
            ->filter(function ($item) {
                return $item->children()->count() == 0;
            })
            ->lists('name', 'id');
        return $categories;
    }
}
