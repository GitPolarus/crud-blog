<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(request()->has('search')){
            $users = User::where('name', 'Like', '%' . request()->input('search') . '%')->get();
        }else{
            $users = User::all();
        }
       
        return view('admin.user.list', ['userList' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }




    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string',
            
        ]);
        $data['admin_id'] = Auth::user()->id;
        $data['role'] = $request->role;
        $data['password'] = Hash::make('pass');

        /* 
        recuperation du fichier
        */

        if ($request->hasFile('profile')) {
            $fileName = $request->file('profile')->getClientOriginalName();
            $path = 'storage/' . $request->file('profile')->storeAs('profiles', $fileName, 'public');
            $data['profile'] = $path;
        }
        

        $user = User::create($data);


        if (isset($user)) {
            return redirect()->route('users.index')->with('success', 'User created successfully');
        }
        
        return redirect()->back()->with('error', 'Error in User Creation')->withInput();

    }





    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        return view('admin.user.show', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string',
        ]);


        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->activated = $request->activated == null ? false : true;

        if ($user->activated) {
            $user->updated_at = now();
        } else {
            $user->updated_at = null;
        }

        
        $user->admin_id = Auth::user()->id;

        /* 
        recuperation du fichier
        */

        if ($request->hasFile('profile')) {
            $fileName = $request->file('profile')->getClientOriginalName();
            $path = 'storage/' . $request->file('profile')->storeAs('profiles', $fileName, 'public');
            $user->profile = $path;
        }
        $user->admin_id = Auth::user()->id;

        if ($user->save()) {
            return redirect()->route('users.index')->with('success', 'User Updated successfully');
        }
        return redirect()->back()->with('error', 'Error in User Updating')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->posts->count()>0) {
            return redirect()->back()->with('info', "You can't delete the user as he has posts available");
        }else {
            $user->delete();
        }
        return redirect()->back()->with('success', "User banned");
    }
}