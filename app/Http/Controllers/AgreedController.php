<?php

namespace App\Http\Controllers;

use App\Models\Agreed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgreedController extends Controller
{
    public function getAllStudents()
    {
        
            $agreed = DB::table('agreeds')->where('supervisor_id',Auth::user()->id)->get();
            $students_id=[];
            
                foreach ($agreed as $value) {
                    array_push($students_id,$value->user_id);
                    
                }
                if (empty($students_id)) {
                    $students_id=[0];
                }
                
            
            
            
            $students = User::whereIn('id',$students_id)->get();
            // return $students ;
            return view('supervisors.dash',compact('students'));
    }
    
}
