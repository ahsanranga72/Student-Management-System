<?php

namespace App\Http\Controllers\Api\V1\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    use FileManager;
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function student_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'profile_image' =>  'image|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Data not found!', 'error' => $validator->errors()->getMessages()], 403);
        }

        $user = $this->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        //$user->profile_image = $request->has('profile_image') ? file_uploader('user/profile/', 'png', $request->profile_image) : null;
        $user->password = bcrypt($request->password);
        $user->type = 'guest';
        $user->is_active = 1;
        $user->save();

        $token = $user->createToken('UserToken')->accessToken;

        return response()->json(['message' => 'Registration Successful', 'token' => $token, 'user' => $user], 200);
    }
}