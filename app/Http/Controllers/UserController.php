<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserInterface as UserInterface;
use App\Repositories\Role\RoleInterface as RoleInterface;
use App\Repositories\Raw\RawInterface as RawInterface;

class UserController extends Controller
{
    /**
     * Load repositories
     */
    private $userRepository;
    private $roleRepository;
    private $rawRepository;

    public function __construct(
        UserInterface $userRepository, 
        RoleInterface $roleRepository,
        RawInterface $rawRepository
    )
    {
        // $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:user-create', ['only' => ['create','store']]);
        // $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:user-delete', ['only' => ['destroy']]);

        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->rawRepository  = $rawRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->userRepository->getAllPagination(5, 'DESC', 'id');
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->getAllName();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, UserService $userService)
    {
        $user = $userService->create($request->all());
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                         ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findById($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $roles = $this->roleRepository->getAllName();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $input = $userService->update($request->all(), $id);        
        $this->rawRepository->deleteHasRawById('model_has_role', 'model_id', $id);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                         ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userService->delete($id);
        return redirect()->route('users.index')
                         ->with('success','User deleted successfully');
    }

}