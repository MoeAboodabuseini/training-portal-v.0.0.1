<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins =User::all()->where('role','admin');
        return view('admin.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin.admin.create_admin');

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
            'name'=> 'required',
            'user_id'=> 'required|unique:users',
            'password'=> 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->user_id = $request->user_id;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->save();
        Alert::success('Admin', 'The Admin Added Successfully');
        return redirect('admins');
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
        $admin = User::find($id);
        return view('admin.admin.edit_admin',compact('admin'));
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
        $request->validate([
            'name'=> 'required',
            'user_id'=> 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->user_id = $request->user_id;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        Alert::success('Admin', 'The Admin Edited Successfully');
        return redirect('admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::error('Admin', 'The Admin Deleted Successfully');
        return redirect('admins');
    }
}
