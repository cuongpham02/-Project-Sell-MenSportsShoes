<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login_admin');
    }

    public function login_dashboard(Request $request)
    {
        $this->validate($request,[
            'admin_email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);

        if (!Users::where('email','=',$request->admin_email)->first()) {
            return redirect('/admin/login')->with('message','Email không đúng');
        } else {
            if(Auth::attempt(['email'=>$request->admin_email, 'password'=> $request->password, 'flag'=>1 ])){
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin/login')->with('message','Password không đúng')->withInput(['admin_email' => $request->admin_email]);

            }
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/admin/login');
    }
}
