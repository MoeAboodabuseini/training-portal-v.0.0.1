<?php

namespace App\Http\Middleware;

use App\Models\Requested;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class isStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role=='user'){
            $requests =Requested::where('user_id',auth()->user()->id)
            ->where('status',5)->get();
            // return($requests);
            // foreach (auth()->user()->requests as $value) {
                if (count($requests)  >0) {
                    $Reports_status = true;
                }else{
                    $Reports_status = false;
                }
            // }
            Session(['Reports_status'=>$Reports_status]);
            // if ((int)(auth()->user()->hours) >= 120) {
                return $next($request);
                // } else {
                // abort(401);
            // }
        }else{
            abort(401);
        }
    }
}
