<?php

namespace App\Http\Controllers\User;

use App\Services\ProfileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($slug, $view)
    {
        $view_arr = ['edit-personal-data', 'edit-login', 'edit-password'];
        if (in_array($view, $view_arr)) {
            $data = ProfileService::edit($slug);
            if (session('change-password')){
                return redirect()->route('profile.index')->with(['alert-type' => 'success', 'message' => session('message')]);
            }
            return view('user.profile.' . $view, compact('data','view'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug, $changes)
    {

        $changes_arr = ['edit-personal-data', 'edit-login', 'edit-password'];
        if (in_array($changes, $changes_arr)) {
            if ($changes == 'edit-personal-data') {
                $data = ProfileService::update_personal_data($request, $slug);
            } elseif ($changes == 'edit-login') {
                $data = ProfileService::update_login($request, $slug);
            } else {
                $data = ProfileService::update_password($request, $slug);
            }
            if ($request->ajax()) {
                return $data;
            } else {
                return back()->with([
                    'change-password' => $data['change-password']??'',
                    'message' => $data['message'],
                    'alert-type' => !empty($data['error']) ? 'error' : 'success',
                ])->withErrors($data['validate_error']);
            }
        } else {
            if ($request->ajax()) {
                return response()->json(['error' => true, 'code' => 404]);
            }
            return abort(404);
        }

    }

}
