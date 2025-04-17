<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{

    public function __construct() {
        $this->middleware('permission:role create', ['only'=>['create', 'store', 'assignPermission']]);
        $this->middleware('permission:role update', ['only'=>['edit', 'update']]);
        $this->middleware('permission:role delete', ['only'=>['destroy']]);
        $this->middleware('permission:role show', ['only'=>['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.role.index')
                    ->with('roles', Role::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Role::create(['name'=>$request->name]);
        Session::flash('success', 'Role created successfully!');

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id); // get the specific role

        return view('backend.role.show', [
            'permissions' => Permission::all(),
            'role' => $role, // pass the role object
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('backend.role.edit')
                    ->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role->name = $request->name;
        $role->save();
        Session::flash('success', 'Role updated successfully!');

        return redirect()->route('role.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return "success";
    }

    public function assignPermission(Request $request, $roleId)
{
    $role = Role::findOrFail($roleId);

    // If checkboxes are empty (all unchecked), this will remove all permissions
    $permissionIds = $request->input('permission', []); // default to empty array

    // Sync permissions - assign selected, remove unselected
    $role->permissions()->sync($permissionIds);

    return redirect()->route('role.index')->with('success', 'Permissions update successfully.');
}

}