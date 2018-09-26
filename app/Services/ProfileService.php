<?php

namespace App\Services;

use App\Events\AddEditUser;
use App\Services\Image\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileService
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
        $data = User::where('slug', $slug)->where('id', $user_id)->firstOrFail();
        return $data;
    }

    public static function update_personal_data($request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'avatar' => 'sometimes|image|mimes:jpeg,jpg,png,gif',
        ]);
        if (Auth::user()->email != $request->email) {
            $email_validate = Validator::make($request->all(), [
                'email' => 'string|unique:users'
            ]);
        } else {
            $email_validate = Validator::make([], []);
        }

//        dd($request->all());
        if ($validator->fails() || $email_validate->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => $validator->fails() ? $validator->messages() : $email_validate->messages()
                ]);
            } else {
                return [
                    'error' => true,
                    'message' => '',
                    'validate_error' => $validator->fails() ? $validator->errors() :
                        $email_validate->fails() ? $email_validate->errors() : '',
                    'success' => false,
                ];
            }
        }

        if (!$request->ajax()) {
            try {
                $user_id = Auth::id();
                $options = Null;
                $data = User::where('slug', $slug)->where('id', $user_id)->firstOrFail();
                $content = (new Image($request, 'users', 'avatar', $options, 'avatar/' . Auth::user()->slug . '/'))->handle();
                if (!is_null($content)) {
                    $data->avatar = $content;
                }
                $data->name = $request->name;
                $data->email = $request->email;
                $data->save();
//                event(new AddEditUser($data));
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

    public static function update_login(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'login' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => $validator->messages()
                ]);
            } else {
                return [
                    'error' => true,
                    'message' => '',
                    'validate_error' => $validator->errors(),
                    'success' => false,
                ];
            }
        }
        if (Hash::check($request->password, Auth::user()->password)) {
            if (Auth::user()->login != $request->login) {
                $validator = Validator::make($request->all(), [
                   'login' => 'unique:users'
                ]);
                if ($validator->fails()) {
                    if ($request->ajax()) {
                        return response()->json([
                            'errors' => $validator->messages()
                        ]);
                    } else {
                        return [
                            'error' => true,
                            'message' => '',
                            'validate_error' => $validator->errors(),
                            'success' => false,
                        ];
                    }
                }

            }
            if (!$request->ajax()){
                $user = User::find(Auth::id());
                $user->login = $request->login;
                $user->save();
                event(new AddEditUser($user));
                return [
                    'error' => false,
                    'message' => __('voyager::generic.successfully_updated'),
                    'validate_error' => '',
                    'success' => true,
                ];
            }else{
                return true;
            }
        }else{
            if ($request->ajax()){
                return response()->json([
                    'errors' => ['password' => [__('passwords.wrong')]]
                ]);
            }
            return [
                'error' => true,
                'message' => __('passwords.wrong'),
                'validate_error' => '',
                'success' => false,
            ];
        }
    }

    public static function update_password(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => $validator->messages()
                ]);
            } else {
                return [
                    'error' => true,
                    'message' => '',
                    'validate_error' => $validator->errors(),
                    'success' => false,
                ];
            }
        }
        if (Hash::check($request->old_password, Auth::user()->password)) {
            if (!$request->ajax()){
                $user = User::find(Auth::id());
                $user->password = bcrypt($request->password);
                $user->save();
                event(new AddEditUser($user));
                return [
                    'error' => false,
                    'message' => __('passwords.reset'),
                    'validate_error' => '',
                    'success' => true,
                    'change-password' => true,
                ];
            }
            return true;
        }else{
            if ($request->ajax()){
                return response()->json([
                    'errors' => ['old_password' => [__('passwords.wrong')]]
                ]);
            }
            return [
                'error' => true,
                'message' => __('passwords.wrong'),
                'validate_error' => '',
                'success' => false,
            ];
        }
    }
}
