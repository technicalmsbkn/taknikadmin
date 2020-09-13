<?php

namespace Moolchand\Taknikadmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Moolchand\Taknikadmin\Models\Role;
use Moolchand\Taknikadmin\Models\User;

class UserController extends Controller
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
        return view('admin.user.list', [
            'users' => User::with('role')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taknikadmin::admin.user.create', [
            'roles' => Role::select('id', 'name')->get(),
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
        request()->validate([
            'name'     => 'required|max:255',
            'password' => 'required',
            'email'    => 'required|unique:users|email',
            'role_id'  => 'required',
        ]);
        $user   = User::create([
            'name'     => request('name'),
            'password' => bcrypt(request('password')),
            'email'    => request('email')
        ]);
        $roles = $request->role_id;
        foreach ($roles as $v) {
            $user->attachRole(Crypt::decrypt($v));
        }
        return redirect('users')->with('success', 'Record Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =User::findOrFail(Crypt::decrypt($id));
        return view('admin.user.edit', [
            'user'  => $user,
            'roles' => Role::pluck('name','id')->all(),
            'role'  => $user->role->pluck('id')->toArray() 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validating form data received from request
        $user = User::where('id', Crypt::decrypt($id))->with('role')->first();
        request()->validate([
            'name'    => 'required|max:255',
            'email'   => $user->email == request('email') ? 'required|email' : 'required|email|unique:users',
            'role_id' => 'required',
        ]);
        $user->update([
            'name'     => request('name'),
            'password' => request('password') ? bcrypt(request('password')) : $user->password,
        ]);
        $user->detachRoles($user->role);
        $roles = $request->role_id;
        foreach ($roles as $k=>$v) {
            $user->attachRole($v);
        }
        return redirect('users')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail(Crypt::decrypt($id));
        $user->detachRole($user->role);
        $user->delete();
        return redirect('users')->with('success', 'Record Deleted Successfully');
    }
    protected function change_status($id, $status)
    {
        $user         = User::findOrFail(Crypt::decrypt($id));
        $user->status = Crypt::decrypt($status);
        $user->save();
        return redirect('users')->with('success', 'Status Change Successfully');
    }
}
