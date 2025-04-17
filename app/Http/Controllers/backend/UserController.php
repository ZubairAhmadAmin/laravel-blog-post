<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    
    public function __construct() 
    {
       $this->middleware('permission:user create', ['only'=>['create', 'store']]); 
       $this->middleware('permission:user update', ['only'=>['edit', 'update']]); 
       $this->middleware('permission:user delete', ['only'=>['destroy']]); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('backend.user.index')
            ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create')
            ->with('roles', Role::all());
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'user_role' => 'required|exists:roles,id',
            'avatar' => 'required',
        ]);

        $role = Role::findOrFail($request->user_role);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role()->associate($role);
        $user->save();

        $profile = new Profile();
        $profile->avatar = $request->avatar;
        $profile->user_id = $user->id;
        $profile->save();

        $profile->image()->create(['image' => $request->avatar]);

        Session::flash('success', 'User create successfully!');

        return redirect()->route('user.index');
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
    public function edit(User $user)
    {
        return view('backend.user.edit')
            ->with('user', $user)
            ->with('roles', Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'user_role' => 'required|exists:roles,id',
            'avatar' => 'nullable|string',
        ]);

        // Update basic user data
        $user->name = $request->name;
        $user->email = $request->email;

        // Update role (one-to-one, not sync)
        $role = Role::findOrFail($request->user_role);
        $user->role()->associate($role);

        $user->save();

        // Ensure profile exists
        $profile = $user->profile ?: $user->profile()->create();

        // Handle avatar upload
        if ($request->avatar) {
            $avatarPath = $request->avatar;

            if ($profile->image) {
                Storage::disk('public')->delete($profile->image->image);
                $profile->image()->delete();
            }
        
            // Save new image
            $profile->image()->create([
                'image' => $avatarPath,
            ]);;
        }

        Session::flash('success', 'User updated successfully!');
        return redirect()->route('user.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Delete profile avatar if exists

        if ($user->profile && $user->profile->avatar) {
            Storage::disk('public')->delete($user->profile->avatar);
        }

        $user->profile()->delete();
        $user->delete();
        return "success";
    }
}
