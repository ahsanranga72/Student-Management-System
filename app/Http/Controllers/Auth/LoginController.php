<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     */
    public function get_form()
    {
        return view('frontend.login');
    }

    /**
    * Show the form for creating a new resource.
    */
    public function submit(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = $this->user->where('email', $request['email'])->first();

        if (isset($user) && auth()->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1], $request->remember)) {
            if($user['type'] == 'admin'){
                return redirect()->route('backend.admin.dashboard');
            } else if($user['type'] == 'student'){
                return redirect()->route('backend.admin.dashboard');
            }else{
                return redirect()->route('home');
            }
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['Credentials does not match.']);
    }
    /**
    * Store a newly created resource in storage.
    */
    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
                return back()->withErrors($validator);
        }

        $user = $this->user;
        $user->name = $request->f_name.' '.$request->l_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->type = 'guest';
        $user->is_active = 1;
        $user->save();

        return back()->withSuccess('Sign up successful.');
    }
}
