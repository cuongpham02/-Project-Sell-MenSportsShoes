<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
       return view('Admin.login_admin');
    }

    public function login_dashboard(Request $request)
    {
        $this->validate($request,[
            'admin_email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);

        if (!Users::where('email','=',$request->admin_email)->first()) {
            return redirect('/Admin/login')->with('message','Email không đúng');
        } else {
            if(Auth::attempt(['email'=>$request->admin_email, 'password'=> $request->password, 'flag'=>1 ])){
                return redirect('/Admin/dashboard');
            }else{
                return redirect('/Admin/login')->with('message','Password không đúng')->withInput(['admin_email' => $request->admin_email]);

            }
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/Admin/login');
    }
}
