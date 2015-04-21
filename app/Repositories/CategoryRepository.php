<?php namespace App\Repositories;

use App\Category;
use App\Post;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * render data for create form
     * @return array
     */
    public function create()
    {
        $parents = $this->model->where('parent_id', null)->lists('name', 'id');
        $parents = array_merge([0 => 'Choose category'], $parents);
        return compact('parents');
    }

    /**
     * create category
     * @param $request
     */
    public function store($request)
    {
        $this->model->create([
            'name' => $request->input('name'),
            'icon' => ($request->file('icon') && $request->file('icon')->isValid()) ? $this->saveImage($request->file('icon')) : 'icon.png',
            'parent_id' => ($request->input('parent_id') == 0) ? null : $request->input('parent_id'),
        ]);
    }

    /**
     * return the data for display in edit form of category.
     * @param $id
     * @return array
     */
    public function edit($id)
    {
        $category = $this->getById($id);
        $parents = $this->model->where('id', '<>', $id)->where('parent_id', null)->lists('name', 'id');
        $parents = array_merge([0 => 'Choose category'], $parents);
        return compact('category', 'parents');
    }

    /**
     * update category
     * @param $request
     * @param $id
     */
    public function update($request, $id)
    {
        $category = $this->getById($id);
        //we do not allow category which have child have posts.
        if ($request->input('parent_id') != 0 && $request->input('parent_id') != $category->parent_id) {
            Post::where('category_id', $request->input('parent_id'))->update(['category_id' => $category->id]);
        }
        $category->update([
            'name' => $request->input('name'),
            'icon' => ($request->file('icon') && $request->file('icon')->isValid()) ? $this->saveImage($request->file('icon'), $category->icon) : $category->icon,
            'parent_id' => ($request->input('parent_id') == 0) ? null : $request->input('parent_id')
        ]);

    }

}
