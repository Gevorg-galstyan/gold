<?php

namespace App\Services;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\Image\MultipleImage;
use TCG\Voyager\Facades\Voyager;

class ProductService
{

    public static function show($slug = false)
    {
        $user_id = Auth::id();
        if ($slug) {
            $data = Product::where('author_id', $user_id)->orderBy('id', 'desc')->where('slug', $slug)->firstOrFail();
        } else {
            $data = Product::where('author_id', $user_id)->orderBy('id', 'desc')->paginate(10);
        }
        return $data;
    }

    public static function edit($slug)
    {
        $user_id = Auth::id();
        $data['categories'] = Category::get();
        $data['data'] = Product::where('slug', $slug)->where('author_id', $user_id)->firstOrFail();
        return $data;
    }

    public static function update(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ru' => 'required',
            'name_hy' => 'required',
            'weight' => 'required',
            'samples' => 'required',
        ]);
        if ($validator->fails()) {
            if ($request->ajax()) {

                return response()->json(['errors' => $validator->messages()]);
            } else {
                return [
                    'error' => true,
                    'message' => '',
                    'validate_error' => $validator->errors(),
                    'success' => false,
                ];
            }
        }

        if (!$request->ajax()) {
            try {
                $content = Null;
                $user_id = Auth::id();
                $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();
                $options = json_decode($dataType->editRows->where('field', 'images')->first()->details);
                $data = Product::where('slug', $slug)->where('author_id', $user_id)->firstOrFail();
                $data->category_id = $request->category;
                $new_images = (new MultipleImage($request, 'categories', 'images', $options,$data->category->slug.'/'.Auth::user()->slug.'/'.$data->slug.'/'))->handle();
                if (isset($data->images)) {
                    $ex_files = json_decode($data->images, true);
                    if (!is_null($ex_files)) {
                        $content = json_encode(array_merge($ex_files, json_decode($new_images)));
                    }
                }
                if (!is_null($content)) {
                    $data->images = $content;
                } else {
                    $data->images = $new_images;
                }
                $name_i18n = json_encode([
                    'en' => $request->name,
                    'ru' => $request->name_ru,
                    'hy' => $request->name_hy]);

                $short_description_i18n = json_encode([
                    'en' => $request->short_description,
                    'ru' => $request->short_description_ru,
                    'hy' => $request->short_description_hy
                ]);

                $description_i18n = json_encode([
                    'en' => $request->description,
                    'ru' => $request->description_ru,
                    'hy' => $request->description_hy
                ]);
                $request->merge([
                    'name_i18n' => $name_i18n,
                    'short_description_i18n' => $short_description_i18n,
                    'description_i18n' => $description_i18n,
                ]);

                $translations = is_bread_translatable($data)
                    ? $data->prepareTranslations($request)
                    : [];
                if (count($translations) > 0) {
                    $data->saveTranslations($translations);
                }

                $shipping = 0;
                if ($request->shipping == 'on'){
                    $shipping = 1;
                }
                $data->weight = $request->weight;
                $data->samples = $request->samples;
                $data->quantity = $request->quantity;
                $data->slug = $request->slug;
                $data->shipping = $shipping;
                $data->save();
                return [
                    'error' => false,
                    'message' => __('voyager::generic.successfully_updated'),
                    'validate_error' => '',
                    'success' => true,
                ];
            } catch (\Exception $exception) {
                return [
                    'error' => true,
                    'message' => __('error.try_again'),
                    'validate_error' => '',
                    'success' => false,
                ];
            }

        }

        return true;
    }

    public static function create()
    {
        $data['categories'] = Category::get();
        $data['data'] = new Product();
        return $data;
    }

    public static function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_ru' => 'required',
            'name_hy' => 'required',
            'weight' => 'required',
            'samples' => 'required',
        ]);
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->messages()]);
            } else {
                return [
                    'error' => true,
                    'message' => '',
                    'validate_error' => $validator->errors(),
                    'success' => false,
                ];
            }
        }
        if (!$request->ajax()) {

            $image_validator = Validator::make($request->all(), [
                'images' => 'required',
                'images.*' => 'image|mimes:jpeg,jpg,png',
            ]);

            if ($image_validator->fails()) {
                return [
                    'error' => true,
                    'message' => '',
                    'validate_error' => $image_validator->errors(),
                    'success' => false,
                ];

            }

            try {
                $content = Null;
                $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();
                $options = json_decode($dataType->editRows->where('field', 'images')->first()->details);
                $data = new Product();
                $data->category_id = $request->category;
                $new_images = (new MultipleImage($request, 'categories', 'images', $options,$data->category->slug.'/'.Auth::user()->slug.'/'.$request->slug.'/'))->handle();
                if (isset($data->images)) {
                    $ex_files = json_decode($data->images, true);
                    if (!is_null($ex_files)) {
                        $content = json_encode(array_merge($ex_files, json_decode($new_images)));
                    }
                }
                if (!is_null($content)) {
                    $data->images = $content;
                } else {
                    $data->images = $new_images;
                }
                $name_i18n = json_encode([
                    'en' => $request->name,
                    'ru' => $request->name_ru,
                    'hy' => $request->name_hy]);

                $short_description_i18n = json_encode([
                    'en' => $request->short_description,
                    'ru' => $request->short_description_ru,
                    'hy' => $request->short_description_hy
                ]);

                $description_i18n = json_encode([
                    'en' => $request->description,
                    'ru' => $request->description_ru,
                    'hy' => $request->description_hy
                ]);
                $request->merge([
                    'name_i18n' => $name_i18n,
                    'short_description_i18n' => $short_description_i18n,
                    'description_i18n' => $description_i18n,
                ]);

                $shipping = 0;
                if ($request->shipping == 'on'){
                    $shipping = 1;
                }
                $translations = is_bread_translatable($data)
                    ? $data->prepareTranslations($request)
                    : [];
                $data->weight = $request->weight;
                $data->samples = $request->samples;
                $data->quantity = $request->quantity;
                $data->slug = $request->slug;
                $data->shipping = $shipping;
                $data->save();

                if (count($translations) > 0) {
                    $data->saveTranslations($translations);
                }
                return [
                    'error' => false,
                    'message' => __('voyager::generic.successfully_updated'),
                    'validate_error' => '',
                    'success' => true,
                ];
            } catch (\Exception $exception) {
                return [
                    'error' => true,
                    'message' => __('error.try_again'),
                    'validate_error' => '',
                    'success' => false,
                ];
            }

        }
        return true;

    }

    public static function change_general_image($slug, $images)
    {
        try {
            $user_id = Auth::id();
            $data = Product::where('slug', $slug)->where('author_id', $user_id)->firstOrFail();
            $data->images = $images;
            $data->save();
            return response()->json([
                'error' => false,
                'message' => __('voyager::generic.successfully_updated'),
                'success' => true,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => true,
                'message' => __('error.try_again'),
                'success' => false,
            ]);
        }

    }

    public static function destroy($slug)
    {
        try {
            $user_id = Auth::id();
            $data = Product::where('slug', $slug)->where('author_id', $user_id)->firstOrFail();
            if ($data->delete()) {
                return 1;
            } else {
                return 0;
            }
        } catch (\Exception $exception) {
            return 0;
        }
    }
}
