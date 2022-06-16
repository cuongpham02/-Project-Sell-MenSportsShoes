<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Role\RoleCreateRequest;
use App\Http\Requests\Admin\Role\RoleUpdateRequest;
use App\Models\Permission\Permission;
use App\Models\Role\Role;
use App\Repositories\Role\RoleRepository;
use App\Services\Admin\Role\CreateRoleService;
use App\Services\Admin\Role\DeleteRoleService;
use App\Services\Admin\Role\ForceDeleteRoleService;
use App\Services\Admin\Role\RestoreRoleServiece;
use App\Services\Admin\Role\UpdateRoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private $repository;

    /**
     * @param RoleRepository $repository
     */
    public function __construct(RoleRepository $repository)
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
        $roles = $this->repository->getAllRoles($attributes);

        return view('Admin.Role.index');
    }

    /**
     * Show view create Role.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('Admin.Role.create',compact('permissions'));
    }

    /**
     * Handel store new role and attack permissions
     * @param RoleCreateRequest $request
     * @param CreateRoleService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleCreateRequest $request, CreateRoleService $service)
    {
        $attributes = $request->only(['role_name','desc']);
        $permissions = $request->only(['premissions']);
        $service->handle($attributes, $permissions);

        return redirect()->route('admin.roles.index');
        //        ->with('success', __('messages.request.create_success'));
    }

    /**
     * Show view edit Role.
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $roles_permissions = DB::table('roles_permissions')->where('role_id', $id)->pluck('permission_id');

        return view('Admin.Role.edit',compact('permissions','role'));
    }

    /**
     * Handle update role and permission
     * @param $id
     * @param     public function update($id, RoleUpdateRequest $request, UpdateRoleService $service)
    $request
     * @param UpdateRoleService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, RoleUpdateRequest $request, UpdateRoleService $service)
    {
        $attributes = $request->only(['role_name','desc']);
        $permissions = $request->only(['premissions']);
        $service->handle($id, $attributes, $permissions);

        return redirect()->route('admin.roles.index');
        //        ->with('success', __('messages.request.update_success'));
    }

    /**
     * Handle softDelete role;
     * @param $id
     * @param DeleteRoleService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id, DeleteRoleService $service)
    {
        $service->handle($id);

        return redirect()->route('admin.roles.index');
        //        ->with('success', __('messages.request.delete_success'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function onlyTrashed()
    {
        $softDeleteRoles = $this->repository->getSoftDeleteRoles();

        return view('Admin.Role.list_softdeletes_roles');
    }

    /**
     * Restore Role.
     * @param $id
     * @param RestoreRoleServiece $serviece
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id, RestoreRoleServiece $serviece)
    {
        $serviece->handle($id);

        return redirect()->route('admin.roles.index');
        //        ->with('success', __('messages.request.restore_success'));
    }

    /**
     * @param $id
     * @param ForceDeleteRoleService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id, ForceDeleteRoleService $service)
    {
        $service->handle($id);

        return redirect()->route('admin.roles.index');
        //        ->with('success', __('messages.request.forcedelete_success'));
    }

}
