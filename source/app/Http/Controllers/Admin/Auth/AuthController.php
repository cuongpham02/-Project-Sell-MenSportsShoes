<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginAdminRequest;
use App\Services\Admin\Auth\LoginAdminService;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('Admin.Auth.login_admin');
    }

    public function Login(LoginAdminRequest $request, LoginAdminService $loginservice)
    {
        $attributes = $request->validated();

        $result = $loginservice->doLogin($attributes);

        return $result;

    }

    public function logout(){
        if (Auth()->guard('admins')->user()) {
            Auth::guard('admins')->logout();
        }
        return redirect()->route('auth.login');
    }
}
