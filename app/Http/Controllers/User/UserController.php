<?php

namespace App\Http\Controllers\User;

use App\Services\RemoveMediaImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }


    public function delete_image(Request $request){
        $helpers = new RemoveMediaImage();
        return $helpers->remove($request);
    }
}
