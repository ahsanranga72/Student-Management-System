<?php

namespace App\Http\Controllers\Api\V1\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function student_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if ($validator->fails()) return response()->json(['message' => 'Data not found!', 'error' => $validator->errors()->getMessages()], 403);

        $user = $this->user->where(['email' => $request['email']])
            ->first();

        $token = null;
        if (isset($user) && Hash::check($request['password'], $user['password'])) {
            $token = $user->createToken('UserToken')->accessToken;
        }

        if(!is_null($token)) {
            return response()->json(['message' => 'Login Successful', 'token' => $token, 'user_type' => $user->type, 'user' => $user], 200);
        }

        return response()->json(['message' => 'Wrong creadentials'], 401);
    }

    /**
     * Logout
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        if ($request->user() !== null) {
            $request->user()->token()->revoke();

            return response()->json(['message' => 'Successfully Logout'], 200);
        }

        return response()->json(['message' => 'Something Wrong'], 403);
    }

}