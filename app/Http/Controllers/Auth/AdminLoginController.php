<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct(Request $request )
    {
    }

    public function showLoginForm(){
        return view('admin.admin-login');
    }
    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(
            $this->credentials($request) + ["status" => 1],
            $request->filled('remember')
        );
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
//        dd($request->all());
        $remember_me = $request->has('remember_me') ? true : false;

        if(Auth::guard('admin')->attempt(
            ['email'=>$request->email, 'password'=>$request->password],$remember_me)){
            $admin=auth()->guard('admin')->user();
            if($admin->status==0){
                Auth::guard('admin')->logout();
                return redirect()->back()->with('warning', __('You can not login because your account is deactivated.'))->withInput($request->only('email'));
            }
            $request->session()->put('is_super_admin',$admin->super_admin);

            return redirect()->intended(route('admin.dashboard'));
        }
//        $credentials = array_values($request->only('username', 'password', 'provider'));
//
//        if (! $user = $this->authenticator->attempt(...$credentials)) {
//            throw new AuthenticationException();
//        }

        return redirect()->back()->with('error',__('Wrong email or password'))->withInput($request->only('email'));

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return  redirect(route('admin.login'));
    }
}
