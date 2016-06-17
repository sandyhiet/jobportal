<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use DB;
use Auth;
use Validator;
use Hash;
use Redirect;
use View;

class jobController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

     public function jobseekerRegistartion(Request $req){

        //return 'adfert';
    
        $firstname                    = $req->firstname;
        $lastname                     = $req->lastname;
        $email                        = $req->email;
        $password                     = $req->password;
        $confirmpassword              = $req->confirmpassword;
        $status                       = $req->status;


        $inputs = [
            
            'firstname'           => $firstname,
            'lastname'            => $lastname,
            'email'               => $email,
            'password'            => $password,
            'confirmpassword'     => $confirmpassword,
        ];
        /*//In ajax validation may or may not be taken in inputs and message it should taken be in rules//*/
        $rules = [

            'firstname'           => 'required',
            'lastname'            => 'required',
            'email'               => 'required|email|unique:users|max:25',
            'password'            => 'required',
            'confirmpassword'     => 'required',
        ];

        

        // $validation = Validator::make($inputs, $rules);
        // if( $validation->fails() ){
        //     return redirect()->back()->withInput()->with('errors', $validation->errors() );
        // }
       
         if( $validation->fails() ){
            return $validation->errors();
        }

        $password                     = bcrypt($req->password);

        $user_id = DB::table('users')->insertGetId([

            
            'email'                  =>$email,
            'password'               =>$password,
            'usertype'              =>'jobseeker'
            
           
        ]);
      
  
        DB::table('resume_post')->insert([

            'firstname'             =>$firstname,
            'lastname'              =>$lastname,
            'user_id'               =>$user_id
            
           
        ]);


       return '1';
        
        //return redirect()->back()->with('message', 'Thank you for Registration');
    }


    // public function jobseekerlogin(Request $req){

    //     $email          = $req->email;
    //     $password       = $req->password;

    //     $userdata = [
    //         'email'          => 'irfan@gmail.com',
    //         'password'       => '12345'
    //     ];

        
    //     if (Auth::attempt(['email' => $email, 'password' => $password]))
    //     {
    //         return redirect('jobseeker_dashboard');

    //     } else {
    //         return 'Auth fail';
    //     }
    // }

    public function jobrecruiter(Request $req){
    
        $FirstName                    = $req->FirstName;
        $LastName                     = $req->LastName;
        $email                        = $req->email;
        $password                     = bcrypt($req->password);
        $confirmpassword              = $req->confirmpassword;

        $inputs = [
            
            'FirstName'           => $FirstName,
            'LastName'            => $LastName,
            'email'               => $email,
            'password'            => $password,
            'confirmpassword'     => $confirmpassword
        ];
        /*//In ajax validation may or may not be taken in inputs and message it should taken be in rules//*/
        $rules = [

            'FirstName'           => 'required',
            'LastName'            => 'required',
            'email'               => 'required|email|unique:users|max:25',
            'password'            => 'required',
            'confirmpassword'     => 'required',
        ];

        

        $validation = Validator::make($inputs, $rules);

        if( $validation->fails() ){
            return $validation->errors();
        }

        $days = DB::table('tbl_package')->select('days')
        ->where('package_id', '1003')->get();
        $days = $days[0]->days;
        // $award_job = $days[0]->award_job;

        //trial end at
        $plan_ends_at = strtotime('+'.$days.' days');
       
        $service_plan='1003'; //3
        // $award_job='90';
        // $days='30';
        $status='1';


        $user_id = DB::table('users')->insertGetId([

            
            'email'                  =>$email,
            'password'               =>$password,
            'status'                 =>$status,
            'service_plan'           =>$service_plan,
            // 'days'                   =>$days,

            // 'award_job'              =>$award_job,

            'usertype'               =>'jobrecruiter',
            'trial_ends_at'          =>$plan_ends_at
            
           
        ]);
      

        
        DB::table('jobrecruiter')->insert([

            'FirstName'              =>$FirstName,
            'LastName'               =>$LastName,
            'user_id'                =>$user_id
            
           
        ]);

       return '1';
      
        return redirect()->back()->with('message', 'Thank you for Registration');
    }


    // public function recruiterlogin(Request $req){
         
    //     return 'gfghf';
    //     $email          = $req->email;
    //     $password       = $req->password;

    //      if (Auth::attempt(['email' => $email, 'password' => $password]))
    //     {
    //         return redirect('recruiter_dashboard');
    //     } else {
    //         return 'Auth fail';
    //     }
    // }


    // UPDATE USER PACKAGE

    public function packageupdate($id){
        $user_id = Auth::user()->id;
         $service_id = $id;
        $selectplan = DB::table('tbl_package')->select('title')->where('package_id','=',$id)->get();
        if(sizeof($selectplan)){
            if($selectplan[0]->title =='Free Trial'){
                return redirect('recruiter_dashboard')->withInput()->with('singleerror', 'You have already this Plan');
            }else{
             DB::table('users')
            ->where('id',$user_id )
            ->update(['service_plan' => $service_id]);

            return redirect('recruiter_dashboard')->withInput()->with('message', 'Your Plan is upgraded Successfully');
            }
        }
        //return($id);


    }
}
