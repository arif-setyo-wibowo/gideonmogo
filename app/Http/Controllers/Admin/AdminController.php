<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Admin',
            'admin' => Admin::all()
        ];

        return view('admin.user-admin.index',$data);
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
        $request->validate([
            'username' => 'unique:user_admins',
        ]);
        $user = new Admin;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('msg', 'Berhasil Menambah Data');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Admin',
            'admin' => Admin::find($id)
        ];

        return view('admin.user-admin.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Admin::find($request->id);

            $request->validate([
                'username'=> Rule::unique('user_admins')->ignore($user->id)
            ]);

            if($request->password == null){
                $password = $request->password_lama;
            }else{
                $password = Hash::make($request->password);
            }

            if ($request->nama_user == null) {
                session(['nama.admin' => $user->nama_user]);
            }else{
                session()->forget('nama.admin');
                session(['nama.admin' => $request->nama_user]);
            }

            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->password = $password;
            $user->save();


            Session::flash('msg', 'Berhasil Mengubah Data');
            return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.index')->with('msg', 'Admin berhasil dihapus');
    }
}
