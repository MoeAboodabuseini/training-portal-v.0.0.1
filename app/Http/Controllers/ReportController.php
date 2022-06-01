<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\Report;
use App\Models\Requested;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userUploadPage()
    {

        $requests = Requested::where('user_id', Auth::user()->id)->where('status', 5)->get();
        $opportunity_ids = [];
        foreach ($requests as $value) {
            array_push($opportunity_ids, $value->opportunity_id);
        }
        if (empty($opportunity_ids)) {
            $opportunity_ids=0;
            
        }
        $opportunities = Opportunity::whereIn('id', [$opportunity_ids])->get();
        // return $opportunities;
        return view('users.upload_report', compact('opportunities', 'requests'));
    }

    public function userUploadFile(Request $request)
    {
        
        $request->validate([

            'report' => 'required',
            'opportunity_id' => 'required',
        ]);
        $userReport = Report::where('user_id', auth()->user()->id)->where('opportunity_id',$request->opportunity_id)
        ->where('uploaded_from','user')->get();
        if (count($userReport) > 0  ) {
            Alert::error('Upload Report', 'You cant Upload more than one report for this opportunity ');
            return back();
        }
        $company= Opportunity::find($request['opportunity_id']);
        $fileName = time() . '.' . $request->report->extension();

        
        $request->report->move(public_path('files'), $fileName);

        Report::create([
            'user_id' => auth()->user()->id,
            'report' => $fileName,
            'opportunity_id' => $request->opportunity_id,
            'company_id' => $company->user_id,
            'status' => 'pending',
            'uploaded_from'=>'user'
        ]);
        $opportunities = Opportunity::with('company')->latest()->paginate(3);
        $request = Requested::all()->where('user_id', auth()->user()->id)->whereIn('status', [0, 2, 4, 5])->count();
        return view('users.dash', compact('opportunities', 'request'));
        // return $opportunities;
    }

   
    public function companyUploadPage()
    {

        $requests = Requested::where('company_id', Auth::user()->id)->where('status', 5)->get();
        $students = User::where('role', 'user')->get();
        // return $requests;
        $opportunity_ids = [];
        
        foreach ($requests as $value) {
            array_push($opportunity_ids, $value->opportunity_id);
        }
        if (empty($opportunity_ids)) {
            $opportunity_ids=[0];
        }
        $opportunities = Opportunity::whereIn('id', $opportunity_ids)->get();
        // return $opportunity_ids;
        return view('companies.company_upload_report', compact('opportunities', 'students'));
    }

    public function companyUploadFile(Request $request)
    {
        
        $request->validate([

            'report' => 'required',
            'opportunity_id' => 'required',
            'user_id' => 'required',
        ]);
        $user = Report::where('user_id', $request->opportunity_id)->where('opportunity_id',$request->opportunity_id)
        ->where('uploaded_from','company')->get();
        if (count($user) > 0  ) {
            Alert::error('Upload Report', 'You cant Upload more than one report for this opportunity ');
            return back();
        }
        $fileName = time() . '.' . $request->report->extension();

        
        $request->report->move(public_path('files'), $fileName);

        Report::create([
            'user_id' => $request->user_id,
            'report' => $fileName,
            'opportunity_id' => $request->opportunity_id,
            'company_id' => auth()->user()->id,
            'status' => 'pending',
            'uploaded_from'=>'company'
        ]);
        Alert::success('Report Upload','Report was Uploaded successfully' );
        $opportunities = Opportunity::with('company')->latest()->paginate(3);
        $request = Requested::all()->where('user_id', auth()->user()->id)->whereIn('status', [0, 2, 4, 5])->count();
        return back();
        // return $opportunities;
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
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $reports = Report::all()->where('company_id', $id);
        return view('companies.reports', compact('reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = Report::find($id);
        $report->status=$request->status;
        $report->save();
        
        Alert::success('Report Status', 'REport Status changed Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
    public function getAllReports()
    {
        
            $agreed = DB::table('agreeds')->where('supervisor_id',Auth::user()->id)->get();
            $opportunity_ids=[];
            $user_id=[];
            foreach ($agreed as $value) {
                array_push($opportunity_ids,(int)$value->opportunity_id);
                array_push($user_id,$value->user_id);
                
            }
            if (empty($opportunity_ids)) {
                $opportunity_ids=[0];
                
            }
            if (empty($user_id)) {
                $user_id=[0];
                
            }
            // return $user_id;
            $reports = Report::whereIn('opportunity_id',$opportunity_ids)->whereIn('user_id',$user_id)->get();
            // return $reports ;
            return view('supervisors.reports',compact('reports'));
    }
}
