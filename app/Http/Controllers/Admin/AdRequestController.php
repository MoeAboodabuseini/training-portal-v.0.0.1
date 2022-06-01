<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendingRequest()
    {
        
        // $requests = DB::table('requests')->where('status',0)->get();
        $requests = Requested::whereIn('status', [0])->with('opportunity')->get();

        // return  $requests;
            return view('admin.requests.request',compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // return $request;
        $req = Requested::find($id);
        $req->status = $request->status;
        $req->save();
        if ($request->status == 2 ) {
            Alert::success('Request', 'The Request accepted Successfully');
        }elseif ($request->status == 1) {
            Alert::error('Request', 'The Request rejected Successfully');
        }
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showAccepted(){
        $requests = Requested::whereIn('status', [2])->with('opportunity')->get();
        return view('admin.requests.request',compact('requests'));
    }

    public function showRejected(){
        $requests = Requested::whereIn('status', [1])->with('opportunity')->get();
        return view('admin.requests.request',compact('requests'));
    }
}
