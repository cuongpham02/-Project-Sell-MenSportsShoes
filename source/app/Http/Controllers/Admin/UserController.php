<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserCreateRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Models\Role\Role;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Services\Admin\User\CreateUserService;
use App\Services\Admin\User\DeleteUserService;
use App\Services\Admin\User\UpdateUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $attributes = $request->all();
        $users = $this->repository->getAllUsers($attributes);

        return view('Admin.User.index');
    }

    /**
     * Show view create User.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('Admin.User.create',compact('permissions'));
    }

    /**
     * Handel store new User and attack permissions
     * @param UserCreateRequest $request
     * @param CreateUserService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request, CreateUserService $service)
    {
        $attributes = $request->only(['User_name','desc']);
        $permissions = $request->only(['premissions']);
        $service->handle($attributes, $permissions);

        return redirect()->route('admin.Users.index');
        //        ->with('success', __('messages.request.create_success'));
    }

    /**
     * Show view edit User.
     * @param User $User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $getIdRoleByUser = DB::table('User_Role')->where('User_id', $id)->pluck('permission_id');

        return view('Admin.User.edit',compact('roles','getIdRoleByUser','user'));
    }

    /**
     * Handle update User and permission
     * @param $id
     * @param     public function update($id, UserUpdateRequest $request, UpdateUserService $service)
    $request
     * @param UpdateUserService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UserUpdateRequest $request, UpdateUserService $service)
    {
        $attributes = $request->only(['name','desc']);
        $permissions = $request->only(['roles']);
        $service->handle($id, $attributes, $permissions);

        return redirect()->route('admin.Users.index');
        //        ->with('success', __('messages.request.update_success'));
    }

    /**
     * Handle softDelete User;
     * @param $id
     * @param DeleteUserService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id, DeleteUserService $service)
    {
        $service->handle($id);

        return redirect()->route('admin.Users.index');
        //        ->with('success', __('messages.request.delete_success'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function onlyTrashed()
    {
        $softDeleteUsers = $this->repository->getSoftDeleteUsers();

        return view('Admin.User.list_softdeletes_users');
    }

    /**
     * Restore User.
     * @param $id
     * @param RestoreUserServiece $serviece
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id, RestoreUserServiece $serviece)
    {
        $serviece->handle($id);

        return redirect()->route('admin.Users.index');
        //        ->with('success', __('messages.request.restore_success'));
    }

    /**
     * @param $id
     * @param ForceDeleteUserService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id, ForceDeleteUserService $service)
    {
        $service->handle($id);

        return redirect()->route('admin.Users.index');
        //        ->with('success', __('messages.request.forcedelete_success'));
    }
}
