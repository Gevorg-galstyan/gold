<?php

namespace App\Http\Controllers;


use App\Services\Home;
use Illuminate\Http\Request;
use App\Services\ProductService;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('frontend.home');
    }

    public function get_cat(Request $request)
    {
       return Home::get_cat($request->all());
    }
}
