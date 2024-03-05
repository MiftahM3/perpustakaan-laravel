<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all();
        $roles = Roles::all();
        return view('tambahuser.index', compact('users','roles'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'email'=>'required|max:255',
            'password'=>'required|max:255',
            'role_id'=>'required',
        ]);
        
         Users::create([
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'role_id'=> $request->role_id,
        ]);
        return redirect('daftar-user')->with('success','Data Berhasil Tersimpan');
        return view('tambahuser.form', compact('users', 'roles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users= User::find($id);
        $this->$users->username; 
        $this->$users->email; 
        $this->$users->password; 
        $this->$users->role_id; 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        $users->username = $request->username;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->role_id = $request->role_id;
        $users->update();
     
        return redirect('daftar-user')->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('daftar-user')->with('success', 'Data Berhasil Dihapus');
    }
}
