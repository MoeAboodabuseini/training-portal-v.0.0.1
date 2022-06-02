<?php

namespace App\Http\Middleware;

use App\Models\Requested;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


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
        if (auth()->user()->role == 'user') {
            $requests = Requested::where('user_id', auth()->user()->id)
                ->where('status', 5)->get();
            // return($requests);
            // foreach (auth()->user()->requests as $value) {
            if (count($requests)  > 0) {
                $Reports_status = true;
            } else {
                $Reports_status = false;
            }
            // }
            Session(['Reports_status' => $Reports_status]);
            if ((int)(auth()->user()->hours) >= 80) {
                return $next($request);
            } else {
                Alert::error('Error', 'You are not a qualified student');
                auth()->logout();
                return back();
            }
        } else {
            auth()->logout();
            abort(401);
        }
    }
}
