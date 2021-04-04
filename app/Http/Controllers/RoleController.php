<?php
    
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role as Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\Http\Requests\RoleRequest;

use App\Repositories\Role\RoleInterface as RoleInterface;
use App\Repositories\Permission\PermissionInterface as PermissionInterface;
use App\Services\RoleService;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $roleRepository;
    private $roleService;
    private $permissionRepository;

    function __construct(
        RoleInterface $roleRepository,
        RoleService $roleService,
        PermissionInterface $permissionRepository
    )
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);

         $this->roleRepository = $roleRepository;
         $this->roleService = $roleService;
         $this->permissionRepository = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->getAllPagination(5, 'DESC', 'id');
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = $this->permissionRepository->getPermission();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(RoleRequest $request)
    {
        $role = $this->roleService->create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->findById($id);
        $rolePermissions = $this->permissionRepository->getJoinRolePermissionById($id);
        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $role = $this->roleRepository->findById($id);
        $permission = $this->permissionRepository->getPermission();
        $rolePermissions = $this->permissionRepository->RawGetRolePermissionById($id);
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = $this->roleRepository->update(['name' => $request->input('name')], $id);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roleRepository->delete($id);
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
