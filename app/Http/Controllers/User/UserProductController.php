<?php

namespace App\Http\Controllers\User;

use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductService::show();
        return view('user.products.browse', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProductService::create();
        return view('user.products.edit-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ProductService::store($request);
        if ($request->ajax()) {
            return $data;
        } else {
            if ($data['validate_error'] || $data['error']){
                return back()->with([
                    'message' => $data['message'],
                    'alert-type' => !empty($data['error']) ? 'error' : 'success',
                ])->withErrors($data['validate_error']);
            }
            return redirect()->route('product.index')->with([
                'message' => __('voyager::generic.successfully_added_new'),
                'alert-type' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = ProductService::edit($slug);
        return view('user.products.edit-add', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = ProductService::update($request, $slug);

        if ($request->ajax()) {
            return $data;
        } else {
            return back()->with([
                'message' => $data['message'],
                'alert-type' => !empty($data['error']) ? 'error' : 'success',
            ])->withErrors($data['validate_error']);
        }

    }

    public function change_general_image(Request $request,$slug)
    {
       return ProductService::change_general_image($slug, $request->images);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $message = ProductService::destroy($slug)
            ? [
                'message' => __('voyager::generic.successfully_deleted') ,
                'alert-type' => 'success',
            ]
            : [
                'message' => __('voyager::generic.error_deleting'),
                'alert-type' => 'error',
            ];
        return back()->with($message);
    }
}
