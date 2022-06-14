<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Roles;
use App\Permission;
use App\Roles_Permissions;
use DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles=Roles::orderby('id','DESC')->get();
        // dd($roles);
        return view('Admin.roles.all_roles')->with(compact('roles'));
    }
    public function add_roles(){
        $permission=Permission::all();
        return view('Admin.roles.add_roles')->with(compact('permission'));
    }
    public function save_roles(Request $request){
            $this->validate($request,[
            'roles_name' => 'required|unique:roles,roles_name|max:100',
        ],
        [
            'roles_name.required' => 'Bạn chưa nhập tên roles',
            'roles_name.unique' => 'Tên roles đã tồn tại',
        ]);
            $data=$request->all();
        try {
            DB::beginTransaction();
            $new_role= new Roles;
            $new_role->roles_name=$request->roles_name;
            $new_role->save();
            $new_role->permission()->attach($request->permission);
            DB::commit();
            return redirect('/Admin/all-roles')->with('message','Thêm roles thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error('Loi:' . $exception->getMessage() . $exception->getLine());
        }
    }
    // public function test(){
    //     $test=Roles::all();
    //     $name=$test->permission()->name;
    //     dd($name);
    // }
    public function edit_roles($id)
    {
        $permissions =Permission::all();
        $role =Roles::findOrfail($id);
        $roles_permissions = DB::table('roles_permissions')->where('role_id', $id)->pluck('permission_id');
        // dd($getAllPermissionOfRole);
        return view('Admin.roles.edit_roles', compact('permissions', 'role', 'roles_permissions'));
    }
    public function validation($request){
        return $this->validate($request,[
            'roles_name' => 'required|unique:roles,roles_name|max:100',
        ],
        [
            'roles_name.required' => 'Bạn chưa nhập tên roles',
            'roles_name.unique' => 'Tên roles đã tồn tại',
        ]);
    }
    public function update_roles(Request $request, $id){
            $roles=Roles::findOrfail($id);
        if ($roles->roles_name==$request->roles_name) {
            $data=$request->all();
            try {
            DB::beginTransaction();
                $role =Roles::findOrfail($id);
                $role->update($data);
                DB::table('roles_permissions')->where('role_id', $id)->delete();
                // $roleCreate = Roles::findOrfail($id);
                $role->permission()->attach($request->permission);
            DB::commit();
                return redirect('/Admin/all-roles')->with('message','Update roles thành công');
            } catch (\Exception $exception) {
            DB::rollBack();
            }
        }else{
            $this->validation($request);
            $data=$request->all();
            try {
            DB::beginTransaction();
                $role =Roles::findOrfail($id);
                $role->update($data);
                DB::table('roles_permissions')->where('role_id', $id)->delete();
                // $roleCreate = Roles::findOrfail($id);
                $role->permission()->attach($request->permission);
            DB::commit();
                return redirect('/Admin/all-roles')->with('message','Update roles thành công');
            } catch (\Exception $exception) {
            DB::rollBack();
            }
        }

    }

    public function delete_roles($id)
    {
        try {
            DB::beginTransaction();
            $role =Roles::find($id);
            if($role){
                $role->permission()->detach();
                $role->users()->detach();
                $role->delete();
            }
            DB::commit();
            return redirect('/Admin/all-roles')->with('message','Xóa roles thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
