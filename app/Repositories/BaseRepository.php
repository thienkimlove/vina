<?php
namespace App\Repositories;


use Intervention\Image\Facades\Image;

abstract class BaseRepository {

    public $model;
    /**
     * destroy a model.
     * @param $id
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    /**
     * get model by id.
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * save image and create resize thumb.
     * @param $request
     * @param null $old
     * @return string
     */
    public function saveImage($image_request, $old_image = null)
    {
        $filename = md5(time()) . '.' . $image_request->getClientOriginalExtension();
        $img = Image::make($image_request->getRealPath());
        $img->save(public_path() . '/files/images/' . $filename);
        if (file_exists(public_path() . '/files/images/' . $old_image)) {
            @unlink(public_path() . '/files/images/' . $old_image);
        }
        return $filename;
    }

}