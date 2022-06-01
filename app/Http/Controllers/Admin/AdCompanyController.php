<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $companies = User::all()->where('role','company');
        return view('admin.companies.companies',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create_company');
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
            'user_id'=>'required|unique:users',
            'email'=>'required',
            'password'=>'required',
            'name'=>'required',
            'major'=>'required',
            'phone'=>'required',
            'zip'=>'required',
            'location'=>'required',
            'description'=>'required',
            
        ]);
        $file = $request->photo;
        $new_file = time().$file->getClientOriginalName();
        $file->move('assets/img/companies', $new_file);
        $pathOf = 'assets/img/companies/'.$new_file;
        $company = new User();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->photo =$pathOf ;
        $company->password = Hash::make($request->password);
        $company->role = 'company';
        $company->major = $request->major;
        $company->location = $request->location;
        $company->user_id = $request->user_id;
        $company->description = $request->description;
        $company->website = $request->website;
        $company->phone = $request->phone;
        $company->save();
        Alert::success('Company', 'The Company Added Successfully');
        return redirect(route('adminCompanies.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $company = User::find($id);
       $company->delete();
       Alert::error('company', 'The company Deleted Successfully');
        return redirect('adminCompanies');
    }
}
