<?php

namespace App\Http\Middleware;
use Auth;
use App\Users;
use App\Permission;
use DB;
use App\Roles_Permissions;
use App\Roles;
use Closure;
use Illuminate\Support\Facades\Route;

class AccessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission=null)
    {
        $roles_id = Users::find(auth()->id())->roles()->select('roles.id')->pluck('id')->toArray();
        // dd($roles_id);
        // dd($permission);

        // dd($get_id_per);

        $get_id_per=Roles_Permissions::whereIn('role_id', $roles_id)->get()->pluck('permission_id')->unique();
        // dd($get_id_per);
        $check_per = Permission::where('name', $permission)->value('id');
        if ( $get_id_per->contains($check_per) ) {
            return $next($request);
        }
        return redirect('/Admin/dashboard');
    }
}
