<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Voyager\VoyagerBaseController;
use App\Models\Category;
use App\Services\CloneImage;
use App\Services\Image\MultipleImage;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\DataType;


class CategoryController extends VoyagerBaseController
{
    public function images($id)
    {
        $dataTypeContent = Category::findORFail($id);
        $dataType = DataType::where('slug', 'categories')->first();
        return view('vendor.voyager.categories.images', compact('dataTypeContent', 'dataType'));
    }

    public function select_images(Request $request, $id)
    {
        $cat = Category::find($id);

        $path = 'categories' . DIRECTORY_SEPARATOR . 'home-cat' . DIRECTORY_SEPARATOR . $cat->slug . DIRECTORY_SEPARATOR;
        if (CloneImage::handle($request->image, $path)) {

            $images = [];
            if (!empty($cat->images)) {
                $images = json_decode($cat->images);
            }
            $images [] = CloneImage::handle($request->image, $path);
            $cat->images = json_encode($images);
            $cat->save();
            return 1;
        } else return 0;
    }

    public function save_image(Request $request)
    {
        $cat = Category::findOrFail($request->id);
        $dataType = Voyager::model('DataType')->where('slug', '=', 'categories')->first();
        $options = json_decode($dataType->editRows->where('field', 'images')->first()->details);
        $path = 'categories' . DIRECTORY_SEPARATOR . 'home-cat' . DIRECTORY_SEPARATOR . $cat->slug . DIRECTORY_SEPARATOR;
        $images = [];
        if (!empty($cat->images)) {
            $images = json_decode($cat->images);
        }
        $images [] = (new MultipleImage($request,'categories', 'images', $options,$path))->handle();
        $cat->save();
        return back();

    }
}
