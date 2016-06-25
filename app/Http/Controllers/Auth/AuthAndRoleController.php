<?php
namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use Session;
use View;
use Hash;
use DB;
use Mail;
use IitplMailer;


//use App\Role;
//use App\Permission;


class AuthAndRoleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function userLogout(){

        Auth::logout();
        //return View::make('logout');
        return Redirect::to('admin');

    }

    public function frontlogout(){


        Auth::logout();
        return Redirect::to('/');

    }
    
    public function recruiter_logout(){

        Auth::logout();
        //return View::make('logout');
        return Redirect::to('/');

    }

    
    
    
    public function postLogin(){
        $rules = array(

            'email'=>'required | email',
            'password'=>'required',

        );

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Redirect::to('admin')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            $remember = Input::has('remember') ? true:false;

            if(Auth::attempt($userdata, $remember)){
                
                $data = array('pageTital'=>'Dashboard');
                return Redirect::to('admin/dashboard');

            } else { 

                Session::flash('flash_message', 'Either email or password is wrong.');
                return redirect()->guest('admin');
            }
        }


        //return $request->email;
    }

    public function saveSubAdmin(){


 

        $name               = Input::get('subAdminName');
        $email              = Input::get('subAdminEmail');
        $plainpassword      = Input::get('subAdminPass');
        $password           = Hash::make(Input::get('subAdminPass'));

        $permissionsArr = Input::get('permissions');




        $inputs = [

            'name'                  => Input::get('subAdminName'),
            'email'                 => Input::get('subAdminEmail'),
            'password'              => Input::get('subAdminPass'),
            'permissionsArr'        => Input::get('permissions'),
            
        ];

        $rules = [

            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required',
            'permissionsArr'        => 'required',
            
        ];

        $messages = [

            'name.required'             => 'Please enter name!',
            'email.required'            => 'Please enter email!',
            'email.email'               => 'Please enter valid email!',
            'email.unique'              => 'This email has  allready  taken',
            'password.required'         => 'Please enter password!',
            'permissionsArr.required'   => 'Please choose atleast one permission!',

        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        

        DB::table('users')->insert(
            ['name' => $name, 'email' => $email, 'password' => $password, 'usertype' => 'subadmin']
        );

        
        $users= DB::table('users')->select('id')->where('email', '=', $email)->first();

        $UserId = $users->id;
        

        //insert allowed route for this user
        foreach($permissionsArr as $permissionsVal){
            DB::table('userspermissions')->insert(
                ['UserId' => $UserId, 'RouteName' => $permissionsVal]
            );
        }
        

        //Send email php mail()
        // $mailmessage    = 'Welcome to AMP as a sub admin';
        // $mailmessage    .= 'Username'.$email;
        // $mailmessage    .= 'Password'.$plainpassword;

        // $subject = 'Sub Admin Account Created';

        // $mailData       = array('mailmessage'=>$mailmessage);
        // $data           = array( 'email' => $email, 'name' => $name, 'subject' => $subject );
       
        // Mail::send('layout.mail.subAdminUserAccount', $mailData, function ($message) use ($data) {
        //     //return $CandidateEmail;
        //     $message->from(env('EMAILFROM'), env('EMAILNAME'));
        //     //$message->to($CandidateEmail)->cc('bar@example.com');
        //     $message->to($data['email'], $name = $data['name']);
        //     $message->cc('daud.csbt@gmail.com', $name = 'Daud Khan');
        //     //$message->bcc($address, $name = null);
        //     //$message->replyTo($address, $name = null);
        //     $message->subject($data['subject']); 
        // });

        return redirect()->back()->withMessage('Sub admin account created');


    }


    public function saverecruiterLogin(){
        //Auth::logout();

        $email              = Input::get('email');
        $password           = Input::get('password');

        $inputs = [

            'email'              => $email,
            'password'           => $password,
        ];

        $rules = [

            'email'          => 'required |email|max:50',
            'password'       => 'required',
        ];

        $messages = [

           
            'email.required'    => 'Enter the email .',
            'password.required'  => 'Enter the password.'
            
           
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('recruiter_login')->withInput()->with('errors', $validator->errors() );
        } else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            $remember = Input::has('remember') ? true:false;
    
            if(Auth::attempt($userdata, $remember)){
                $getuserType = DB::table('users')->select('*')->where('email','=',$userdata['email'])->get();
                if($getuserType[0]->activeAccount != 1){
                    return redirect()->back()->withInput()
                ->with('singleerrors', 'Your account is deactive');
                        
                }elseif($getuserType[0]->usertype != 'jobrecruiter'){
                    return redirect()->back()->withInput()
                ->with('singleerrors', 'Either email or password is wrong.');
                        
                }else{
                     return redirect('recruiter_jobspost');
                }
 
 
            } else {
                return redirect()->back()->withInput()
                ->with('singleerrors', 'Either email or password is wrong.');
       
            }
        }
 
    }

    public function update_resetpassword(Request $req){
       
        $id = $req->id;
        $password = $req->password;
        $repassword = $req->repassword;
        $inputs = [

            'password'                  => $password,
            'repassword'                => $repassword,
            
        ];

        $rules = [

            'password'                  => 'required',
            'repassword'                => 'required',
        ];

        $messages = [

            'password.required'             => 'Enter password .',
            'repassword.required'           => 'Re-enter password.',

        ];

        $validator = Validator::make($inputs, $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withInput()->with('errors', $validator->errors() );
        }else {
            $userdata = array(
                'password' => $req->password,
                'repassword' => $req->repassword
            );
            if($userdata['password']!=$userdata['repassword']){
             Session::flash('flash_message', 'Password not match.'); 
             return redirect()->back()->withInput()->with('flash_message', 'Password not match.');  
         }else{
            $hashpassword = Hash::make($userdata['password']);
            DB::table('resetrequest_id')->where('user_id', '=', $id)->delete();
            DB::table('users')
            ->where('id', $id)
            ->update(['password' => $hashpassword]);
           
            return redirect('recruiter_login');
         }
        }    
    }
    public function recruiterresetpassword(Request $req){
       
        $email = $req->email;
      
        $inputs = [

            'email'                  => $email,
            
            
        ];

        $rules = [

            'email'                  => 'required|email|max:50',
            
        ];

        $messages = [

            'email.required'             => 'Enter registered email .',
            'email.email'                => 'Enter valid email.',

        ];

        

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withInput()->with('errors', $validator->errors() );
        }


        $vaildEmail = DB::table('users')->select('email')->where('usertype', 'jobrecruiter')->where('activeAccount', 1)->get();
          //return $vaildEmail;
          foreach ($vaildEmail as $key => $value) {
             $allemail= $vaildEmail[$key]->email;
              if($allemail != $email){

                    $ExistHeading = DB::table('users')->where('email', '=', $email)->where('usertype', 'jobrecruiter')->where('activeAccount', 1)->count();
                    if($ExistHeading == 0){
                        return redirect()->back()->withInput()->with('singleerror', 'Please Enter Registered Email-Id.' );
                    }
                }
               
           } 



        $user_id = DB::table('users')->select('*')->where('email','=',$email)->where('usertype', 'jobrecruiter')->where('activeAccount', 1)->get();
        $id = $user_id[0]->id;
        $hashvalue = md5(999999);
        // insert hash value in forget_password table
        DB::table('resetrequest_id')->insert([
              'req_id' => $hashvalue,
              'user_id' => $id
                
        ]);

        //Recruiter Reset Password mail
        $mailmessage    = env('SITEURL').'recruiterresetpassword/'.$id.'/'.$hashvalue;
        $mailmessage1    =  'Please click the following link for reset password';
        $subject         = 'Reset Your Password';

        $mailData       = array('mailmessage'=>$mailmessage, 'mailmessage1'=>$mailmessage1);
        $data           = array('email' => stripslashes($email),'subject' => $subject ); 

        $recruiterforgetpasswordmail ='layouts.mail.recruiter_forget_password';
        IitplMailer::sendemailwithoutname($recruiterforgetpasswordmail,$mailData,$data);

       
        return redirect()->back()->withInput()->with('message','Reset password link is send to your email.');
    }

    public function recruiterchangepassword(Request $req){

        //return "xcvc";
        $recruiter_id            = $req->recruiter_id;

        $oldpassword             = $req->oldpassword;
        $newpassword             = $req->newpassword;
        $confmpassword           = $req->confmpassword;

        $inputs = [

            'oldpassword'        => $oldpassword,
            'newpassword'        => $newpassword,
            'confmpassword'      => $confmpassword
            
        ];

        $rules = [

            'oldpassword'                  => 'required|max:15',
            'newpassword'                  => 'required|same:confmpassword|max:15',
           
            
        ];

        $messages = [

            'oldpassword.required'          => 'Enter your old password.',
            'newpassword.required'          => 'Enter your new password.',
           
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        if($newpassword != $confmpassword){
            return redirect()->back()->withInput()->with('singleerrors', 'Password do not match.' );
        }


        //check old password
        $hashedPassword = DB::table('users')->where('id','=', $recruiter_id)->where('usertype', 'jobrecruiter')->get();
        $hashedPassword = $hashedPassword[0]->password;

        
        $hashedNewPassword = bcrypt($req->newpassword);
        if (Hash::check($oldpassword, $hashedPassword)) {
            // The passwords match...
            DB::table('users')->where('id', $recruiter_id)->where('usertype', 'jobrecruiter')->update([

                'password'   => $hashedNewPassword
            
            ]);

        } else {
            return redirect()->back()->withInput()->with('singleerrors', 'Wrong old password.' );
        }
        


        
        return redirect()->back()->withInput()->with('message', 'Password updated.');

    }





    public function userupdate(){




        $name               = Input::get('subAdminName');
        $email               = Input::get('email');
        $id                 = Input::get('id');
        $permissionsArr     = Input::get('permissions');




        $inputs = [

            'name'                  => Input::get('subAdminName'),
            'permissionsArr'        => Input::get('permissions'),
            
        ];

        $rules = [

            'name'                  => 'required',
            'permissionsArr'        => 'required',
            
        ];

        $messages = [

            'name.required'             => 'You have pass blank name.',
            'permissionsArr.required'   => 'You don\'t have pass any permission.',

        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        

        

        DB::table('users')->where('id', $id)->update(['name' => $name]);

        
        $users= DB::table('users')->select('id')->where('email', '=', $email)->first();

        $UserId = $users->id;
        
        DB::table('userspermissions')->where('UserId', '=', $UserId)->delete();
        //insert allowed route for this user
        foreach($permissionsArr as $permissionsVal){
            DB::table('userspermissions')->insert(
                ['UserId' => $UserId, 'RouteName' => $permissionsVal]
            );

        }

        

        return redirect()->back()->withMessage('Record Updated');


    }


    


    public function newUser(){

        $newRole = new Role();
        $newRole->name         = 'jobPost';
        $newRole->save();

        $newRole = new Role();
        $newRole->name         = 'latestHappening';
        $newRole->save();


        //ROLES
        // $admin = new Role();
        // $admin->name = 'Admin1';
        // $admin->save();

        // $student       = new Role();
        // $student->name = 'Admin2';
        // $student->save();

        // $owner = new Role();
        // $owner->name         = 'SuperAdmin';
        // $owner->display_name = 'Super Admin'; // optional
        // $owner->description  = 'All Priv'; // optional
        // $owner->save();

        
        // $owner               = new Permission();
        // $owner->name         = 'SuperAdmin';
        // $owner->display_name = 'can manage all content';
        // $owner->save();
        
        // $manage_profile               = new Permission();
        // $manage_profile->name         = 'manage_profile';
        // $manage_profile->display_name = 'manage profile';
        // $manage_profile->save();

        // $admin->attachPermission($manage_students);
        // $student->attachPermission($manage_profile);

        // $adminRole = DB::table('roles')->where('name','=','Admin')->pluck('id');

        // $user1 = User::where('username','oluwaslim')->first();
        // $user1->roles()->attach($adminRole);

        return "done";

    }


    public function volunteerLogin(){
       
       

        $userdata = array(
            'email' => Input::get('username'),
            'password' => Input::get('userpass')
        );

        $remember = Input::has('remember') ? true:false;

        if(Auth::attempt($userdata, $remember)){
                
            $data = array('pageTital'=>'Dashboard');
            if(Input::get('from_mob') !== null){
                return redirect('/');
            }
            return '1';

        } else { 

            if(Input::get('from_mob') !== null){
                return redirect()->back()->with('singleerror', 'Either email or password is wrong.');
            }

            return 'Either email or password is wrong.';
        }


    }

    public function jobseeker_login(){
        //Auth::logout();

        $email              = Input::get('email');
        $password           = Input::get('password');

        $inputs = [

            'email'              => $email,
            'password'           => $password,
        ];

        $rules = [

            'email'          => 'required | email',
            'password'       => 'required',
        ];

        $messages = [

           
            'email.required'    => 'Enter the email .',
            'password.required'  => 'Enter the password.'
            
           
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('jobseekerlogin')->withInput()->with('errors', $validator->errors() );
        } else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );
 
            if(Auth::attempt($userdata)){
                $getuserType = DB::table('users')->select('usertype')->where('email','=',$userdata['email'])->get();
                if($getuserType[0]->usertype != 'jobseeker'){
                    return redirect()->back()->withInput()
                ->with('singleerrors', 'Either email or password is wrong.');
                        
                }else{
                     return redirect('jobseeker_dashboard');
                }
 
 
            } else {
                return redirect()->back()->withInput()
                ->with('singleerrors', 'Either email or password is wrong.');
       
            }
        }
 
    }


   

    public function recruiterlogin(){


        $email                        = $req->email;
        $password                     = $req->password;
        


        $inputs = [
            
            'email'               => $email,
            'password'            => $password
            
        ];
        /*//In ajax validation may or may not be taken in inputs and message it should taken be in rules//*/
        $rules = [

            'email'               => 'required',
            'password'            => 'required',
           
        ];

        

        $validation = Validator::make($inputs, $rules);

        if( $validation->fails() ){
            return $validation->errors();
        }


        Auth::logout();
        $userdata = array(
        'email' => Input::get('email'),
        'password' => Input::get('password')
        );

        $remember = Input::has('remember') ? true:false;

        if(Auth::attempt($userdata, $remember)){

            return 'recruiter_dashboard';

            //return redirect('recruiter_dashboard');


        } else { 

        return redirect()->back();

        }


    }



    

    public function jobseekerLoginOnly(){
       
        Auth::logout();

        $userdata = array(
            'email' => Input::get('username'),
            'password' => Input::get('userpass'),
        );

        $JobId = Input::get('JobId');

        $remember = Input::has('remember') ? true:false;

        if(Auth::attempt($userdata, $remember)){
                
            //check usertype
            $usertype = Auth::user()->usertype;
            $id = Auth::user()->id;
            if($usertype == 'jobseeker'){

                
                
                return redirect()->back()->with('message', 'Logged in.');
            }

            return redirect()->back()->withInput()->with('singleerror', 'Either email or password is wrong.');

        } else { 

            return redirect()->back()->withInput()->with('singleerror', 'Either email or password is wrong.');
        }


    }

    public function job_apply($JobId){
        
        //check usertype
        if(Auth::check()){
            $usertype = Auth::user()->usertype;
            $id = Auth::user()->id;
            if($usertype == 'jobseeker'){

                DB::table('jobapplications')->insert([
                    'JobId'=>$JobId,
                    'CandidateId'=>$id,
                ]);
                return redirect()->back()->with('message', 'Applied for one job.');

            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

    }
    



    
}
