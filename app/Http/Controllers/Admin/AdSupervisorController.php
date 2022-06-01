<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agreed;
use App\Models\Opportunity;
use App\Models\Requested;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdSupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Supervisors = User::where('role', 'supervisor')->get();
        // return $Supervisors; 
        return view('admin.Supervisor.showAllsupervisors', compact('Supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Supervisor.create');
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
            'user_id' => 'required|unique:users',
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
        // return $request;
        User::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'supervisor',
            'phone' => $request->phone,
        ]);

        Alert::success('Supervisor', 'The Supervisor Created Successfully');
        // return redirect(route('adminCompanies.index'));
        return redirect(route('Supervisors.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor = User::find($id);
        // return $supervisor;
        return view('admin.Supervisor.edit', compact('supervisor'));
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
            'user_id' => 'required',
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
        // return $request;
        $supervisor = User::find($id);
        $supervisor->user_id = $request->user_id;
        $supervisor->name = $request->name;
        $supervisor->email = $request->email;
        $supervisor->phone = $request->phone;
        if ($request->password != null) {
            $supervisor->password = $request->password;
        }
        $supervisor->save();
        Alert::success('Supervisor', 'The Supervisor Edited Successfully');
        // return redirect(route('adminCompanies.index'));
        return redirect(route('Supervisors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $supervisor = User::find($id);
        $supervisor->delete();
        Alert::error('Supervisor', 'The Supervisor deleted Successfully');
        return back();
    }

    public function assignSupervisorPage()
    {
        $supervisors = User::where('role', 'supervisor')->get();
        $requests = Requested::whereIn('status', ['waiting to assign a supervisor', 4])->with('opportunity')->with('agreed')->get();
        if (empty($requests)) {
            $requests = [];
        }
        // return $requests;
        // return $requests[0]->agreed[0]->user->name;
        return view('admin.Supervisor.assign_supervisor', compact('requests', 'supervisors'));
    }
    public function assignSupervisor(Request $request, $id)
    {
        $supervisor = User::find($request->supervisor_id);

        // return $supervisor->hours;
        if (12 - (int)($supervisor->hours) > 0) {
            $supervisor->hours = ($supervisor->hours + 0.5);
            $supervisor->save();
            $opportunity = Opportunity::find($request->opportunity_id);
            Agreed::create([
                'user_id' => $request->user_id,
                'opportunity_id' => $request->opportunity_id,
                'supervisor_id' => $request->supervisor_id,
                'admin_id' => Auth::user()->id,
                'company_id' => $request->company_id,
                'isReported' => 0,
                'request_id' => $id,
                'finished_at' => Carbon::createFromFormat('Y-m-d', $opportunity->starting_date)->addWeeks(8),
            ]);
            $req =  Requested::find($id);
            $req->status = 4;
            $req->save();


            return redirect(route('assignSupervisorPage'));
        } else {
            Alert::error('Assign Supervisor', 'you cant assign Supervisor, Because he has exceeded the hour limit');
            return back();
        }
        // return $request;

    }
}
