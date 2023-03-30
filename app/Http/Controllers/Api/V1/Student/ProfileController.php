<?php

namespace App\Http\Controllers\Api\V1\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use FileManager;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get(Request $request)
    {
        $user = $this->user->where('id', $request->user()->id)->first();

        return response()->json(['user' => $user], 200);
    }
    
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'profile_image' =>  'image|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Data not found!', 'error' => $validator->errors()->getMessages()], 403);
        }

        $user = $this->user->where('id', $request->user()->id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->profile_image = $request->has('profile_image') ? $this->image_uploader('user/', 'png', $request->profile_image) : null;
        $user->save();

        return response()->json(['message' => 'Profile Updated.', 'user' => $user], 200);
    }
}
