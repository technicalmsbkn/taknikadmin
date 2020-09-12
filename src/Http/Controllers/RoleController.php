<?php

namespace Moolchand\Taknikadmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Moolchand\Taknikadmin\Models\Permission;
use Moolchand\Taknikadmin\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.list', [
            'roles' => Role::with(['permission' => function ($query) {
                    $query->select('id', 'name');
                }])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create', [
            'permissions' => Permission::select('id', 'name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = request()->validate([
            'name'          => 'required|unique:roles|max:100|regex:/^[a-zA-Z ]*$/',
            'display_name'  => 'required|max:100|regex:/^[a-zA-Z ]*$/',
            'description'   => 'nullable|max:255|regex:/^[a-zA-Z ]*$/',
            'permission_id' => 'required',
        ]);
        $role = Role::create([
            'name'         => request('name'),
            'display_name' => request('display_name'),
            'description'  => request('description'),
        ]);
        $permissions = $request->permission_id;
        foreach ($permissions as $k=>$v) {
            $role->attachPermission(Crypt::decrypt($v));
        }
        return redirect('roles')->with('success', 'Record Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail(Crypt::decrypt($id));
        return view('admin.role.edit', [
            'role'        => $role,
            'permissions' => Permission::pluck('name','id')->all(),
            'permission'  => $role->permission->pluck('id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role             = Role::findOrFail(Crypt::decrypt($id));
        $validator = request()->validate([
            'name'          => $role->name === request('name') ? 'required|max:100' : 'required|unique:roles|max:100|regex:/^[a-zA-Z ]*$/',
            'display_name'  => 'required|max:100|regex:/^[a-zA-Z ]*$/',
            'description'   => 'nullable|max:255|regex:/^[a-zA-Z ]*$/',
            'permission_id' => 'required',
        ]);
        $role->update([
            'name'         => request('name'),
            'display_name' => request('display_name'),
            'description'  => request('description'),
        ]);
        $role->detachPermissions($role->permission);
        $permissions = $request->permission_id;
        foreach ($permissions as $k=>$v) {
            $role->attachPermission($v);
        }
        return redirect('roles')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail(Crypt::decrypt($id));
        $role->detachPermissions($role->permission);
        $role->delete();
        return redirect('roles')->with('success', 'Record Deleted Successfully');
    }
}
