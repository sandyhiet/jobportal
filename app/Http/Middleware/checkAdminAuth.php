<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
use URL;

class checkAdminAuth
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

        if(Auth::check()){

            $id   = Auth::user()->id;
            $user_type = DB::table('users')->select('usertype')->where('id', '=', $id)->get();

            if($user_type[0]->usertype != 'superadmin'&& $user_type[0]->usertype != 'subadmin'){

                return redirect('admin');

            }else if($user_type[0]->usertype =='subadmin'){

                    $userAllowedRoute = DB::table('userspermissions')->select('RouteName')->where('UserId', '=', $id)->get();

                    $path = $request->path();
                    if(count($userAllowedRoute) > 0){



                        $RouteNameArr = array();
                        foreach($userAllowedRoute as $key => $allowedRoute){
                            $RouteName = 'admin/'.$userAllowedRoute[$key]->RouteName;
                            array_push($RouteNameArr, $RouteName);
                        }

                        
                        
                    

                        // return print_r($RouteNameArr);

                        if(in_array($path, $RouteNameArr) || in_array('all', $RouteNameArr) || $path=='admin/dashboard'){
                        
                            
                            return $next($request);

                    } else {
                           return redirect('admin/accessdenaid'); 
                        //return  '<a href="'.URL::previous().'">Back</a>';
                        //return redirect('admin/dashboard')->with('singleerror', 'Access Denaid');
                        //return view('admin/fail');
                    }
                }   
        } } else{
            return redirect('admin');
              }
        return $next($request);    

    }

}
