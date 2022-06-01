<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opportunities = Opportunity::all();
        return view('admin.opportunities.showAllOpportunities', compact('opportunities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = User::where('role','company')->get();
        // return $companies;
        return view('admin.opportunities.create_opportunity',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $file = $request->photo;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('assets/img/opportunities', $new_file);
        $pathOf = '../../assets/img/opportunities/' . $new_file;
        $opportunity = new Opportunity();
        $opportunity->user_id     = $request->user_id;
        $opportunity->starting_date = $request->starting_date;
        $opportunity->details = $request->details;
        $opportunity->name = $request->name;
        $opportunity->major = strtolower($request->major);
        $opportunity->supervisor_name = $request->supervisor_name;
        $opportunity->supervisor_email = $request->supervisor_email;
        $opportunity->supervisor_phone = $request->supervisor_phone;
        $opportunity->seats = $request->seats;
        $opportunity->photo = $pathOf;
        $opportunity->save();
        Alert::success('Opportunity', 'The Opportunity Added Successfully');

        $opportunities = Opportunity::all();
        return redirect()->route('show.Opportunities', compact('opportunities'));
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
        $opportunity = Opportunity::find($id);
        return view('admin.opportunities.editOpportunity', compact('opportunity'));
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
        $opportunity =  Opportunity::find($id);
        $opportunity->starting_date = $request->starting_date;
        $opportunity->details = $request->details;
        $opportunity->name = $request->name;
        $opportunity->major = $request->major;
        $opportunity->supervisor_name = $request->supervisor_name;
        $opportunity->supervisor_email = $request->supervisor_email;
        $opportunity->supervisor_phone = $request->supervisor_phone;
        $opportunity->seats = $request->seats;
        $opportunity->status = $request->status;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('assets/img/opportunities', $new_file);
            $pathOf = 'assets/img/opportunities/' . $new_file;
            $opportunity->photo = $pathOf;
        }
        $opportunity->save();
        Alert::success('Opportunity', 'The Opportunity edited Successfully');
        return redirect()->route('show.Opportunities');
    }
    public function ChangeStatus(Request $request, $id)
    {
        $opportunity =  Opportunity::find($id);
        $opportunity->status = $request->status;
        $opportunity->save();
        Alert::success('Opportunity', 'The Opportunity edited Successfully');
        return redirect()->route('show.Opportunities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $req = DB::table('requests')->where('opportunity_id', $id)->get();
        if (count($req) > 0) {
            Alert::error('Opportunity', 'You Cant Delete This Opportunity');
            return back();
        }
        $opp = Opportunity::find($id);
        $opp->delete();
        Alert::error('Opportunity', 'You  Delete This Opportunity');
        return back();
    }
}
