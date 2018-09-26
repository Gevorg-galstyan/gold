<?php

namespace App\Services;


use App\Models\Category;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class Home
{
    public static function get_cat($request)
    {
        $validator = Validator::make($request, [
            'cats' => 'required',
            'index' => 'required|integer|min:1'
        ]);
        if ($validator->fails() || !is_array($request['cats'])) {
            return false;
        }

        $ids = [];
        foreach ($request['cats'] as $cat) {
            $ids[] = decrypt($cat);
        }

        $category = Category::whereNotIn('id', $ids)->inRandomOrder()->first();
        $data['category'] = $category;
        $count_cat = count($ids) + 1;
        if (Category::count() >= $count_cat) {
            $load_more = true;
        } else {
            $load_more = false;
        }
        if ($load_more){
            return View::make('frontend.layouts.home-single-category', [
                'category' => $category,
                'i' => $request['index'],
                'spin' => true
            ]);
        }else{
            return '';
        }



//        $contents = view('frontend.layouts.home-single-category', [
//            'category' => $category,
//            'i' => $request['index'],
//        ]);
//        $response = Response::json($contents);
//        $response->header('Content-Type', 'application/javascript');
//        return $response;

    }
}
