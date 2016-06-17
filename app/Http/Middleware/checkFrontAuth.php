<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class checkFrontAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //if some condition true
        
        if(!Auth::check()){
            return redirect('/')->with('sdf', 'sdf');
        }
        
        // if(Auth::check()){
        //     $id   = Auth::user()->id;
        //     $user_type = DB::table('users')
        //     ->select('usertype')->where('id', '=', $id)
        //     ->get();
        //     if($user_type[0]->usertype != 'jobseeker'){
        //         return redirect('/');
        //     } else if($user_type[0]->usertype != 'jobrecruiter'){
        //         return redirect('/');
        //     } 
        //     //$path = $request->path();
        //     //here path is route name
        // } else {
        //     return redirect('/');
        // }
        //$next is a callback function mins request now can go for furthur action
        return $next($request);
    }
}
