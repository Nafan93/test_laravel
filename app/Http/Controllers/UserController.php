<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Position;
use App\Models\Role;

use Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('home', compact('users', $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')->with([
            'user' => [],
            'departments' => Department::get(),
            'positions' => Position::get(),
            'roles' => Role::get(),
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
        //Validate input
        $request->validate([
            'name'=>'required',
            'email'=>'required | email | unique:users',
            'password' => 'required | min:8',
            'position_id' => 'required',
            'roles' => 'required'
        ]);

        //Create new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->position_id = $request->position_id;
        $user->save();

        //Set relations
        if($request->has('departments')) {
            $user->departments()->attach($request->input('departments'));
        }
        if($request->has('roles')) {
            $user->roles()->attach($request->input('roles'));
        }
        //Save image in storage/app/public/
        if ($request->has('image')) {
            $imagePath = Storage::disk('public')->put( 'user_id ' . $user->id  , $request->image);
            $user->image = '/storage/' . $imagePath;
        }

        $user->save();
        return redirect('/')->with('success', 'User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',  [
            'user' => $user,
            'departments' => Department::get(),
            'positions' => Position::get(),
            'roles' => Role::get(), 
            ]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Validate unique email
        $request->validate([
            'email' => 'email | unique:users,email,'. $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        //If New Password == Null
        if ($request->password == '') {
            $user->password = $user->password;
        }
        $user->password = Hash::make($request->password);
        $user->position_id = $request->position_id;
        $user->save();
        //Update relations
        $user->departments()->detach();
            if($request->input('departments')):
                $user->departments()->attach($request->input('departments'));
            endif; 
        $user->roles()->detach();
            if($request->input('roles')):
                $user->roles()->attach($request->input('roles'));
            endif;
        //Update image
        if ($request->has('image')) {
            $imagePath = Storage::disk('public')->put( 'user id ' . $user->id  , $request->image);
            $user->image = '/storage/' . $imagePath;
        }
        $user->save();   
            
        return redirect('/')->with('success', 'User updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $id = $user->id;
        $user = User::find($id);
        //If user was deleted before
        if($id === null) {
            return redirect('/')->with('success', 'User was deleted');
        }
        //Detach relations
        $user->departments()->detach();
        $user->roles()->detach();
        //Delete
        $user->delete();
        return redirect('/')->with('success', 'User deleted');
    }
}
