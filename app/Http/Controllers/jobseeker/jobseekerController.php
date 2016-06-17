<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\jobseeker;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use Hash;
use File;
use Auth;
use Session;
use View;
use Mail;



class jobseekerController extends Controller
{
   

    public function saveResumePost(Request $req){
        
        $email       = $req->email;
        $password    = bcrypt($req->password);
        $name                 = $req->name;
        $location             = $req->location;
        $photo                = $req->file('photo');
        $phone                = $req->phone;
        $resume_content       = $req->resume_content;
        $resume              = $req->file('resume');
        $dob                = $req->dob;

        $inputs = [
            'email'        => $email,
        ];

        $rules = [
            'email'        => 'email|unique:users,email',
        ];

        $messages = [
            'email.required'  => 'Email is required.',
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }



        if($photo){
            

            $destinationPath    ='jobseekerImage'; // upload path folder should be in public folder
           

            $extension      = $photo->getClientOriginalExtension(); // getting image extension
            $originalName   = $photo->getClientOriginalName();
            $size           = $photo->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){
                //save original
                Image::make($photo)->save($destinationPath.'/'.$fileName1);
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }

        if($resume){
            

            $destinationPath    ='jobseekerResume'; // upload path folder should be in public folder
           

            $extension      = $resume->getClientOriginalExtension(); // getting image extension
            $originalName   = $resume->getClientOriginalName();
            $size           = $resume->getSize();
            $fileName2      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='doc') || ($extension=='docx') || ($extension=='txt') || ($extension=='pdf'))&&($size<5000000)){

               
                //save original
                $resume->move($destinationPath, $fileName2);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB doc or txt or pdf file is allowed.' );
            }
        } else {
            $fileName2 = '';
        }
        

       $job_seeker_id = DB::table('users')->insertGetId([
            'email'     =>$email,
            'password'  =>$password,
            'usertype'=>'jobseeker'
        ]);  


        

        


        DB::table('jobseeker_persional')->insertGetId([
            'name'              => $name,
            'location'          => $location,
            'image'             => $fileName1,
            'phone'             => $phone,
            'resume_content'    => $resume_content,
            'job_seeker_id'     => $job_seeker_id,
            'dob'               => $dob,
            'resume'            => $fileName2
        ]);



        $social_network       = $req->social_network;

        if($social_network == ''){
            $social_network = '';
        } else {
            $social_network    = implode(',', $social_network);  
        }

        $url                  = $req->url;

        if($url == ''){
            $url = '';
        } else {
            $url    = implode(',', $url);  
        }


        DB::table('jobseeker_socialnetwork')->insertGetId([
            'social_network'    => $social_network,
            'url'               => $url,
            'job_seeker_id'     => $job_seeker_id
        ]);



       
        $designation                = $req->designation;
        $designation_arr            = array();
        $exp_date                   = $req->exp_date;
        $exp_date_arr               = array();
        $responsibilities           = $req->responsibilities;
        $responsibilities_arr       = array();
        $company_name               = $req->company_name;
        $company_name_arr           = array();
        foreach($company_name as $key=>$val){
            
            if($val != ''){
                array_push($company_name_arr,$val);
            }
        }
        $company_name    = implode(',', $company_name_arr);  
        

        foreach($designation as $key=>$val){
            
            if($val != ''){
                array_push($designation_arr,$val);
            }
        }
        $designation    = implode(',', $designation_arr);  

        foreach($exp_date as $key=>$val){
            
            if($val != ''){
                array_push($exp_date_arr,$val);
            }
        }
        $exp_date    = implode(',', $exp_date_arr);  

        foreach($responsibilities as $key=>$val){
            
            if($val != ''){
                array_push($responsibilities_arr,$val);
            }
        }
        $responsibilities    = implode(',', $responsibilities_arr);  


        DB::table('jobseeker_experience')->insertGetId([
           
            'company_name'      => $company_name,
            'designation'       => $designation,
            'exp_date'          => $exp_date,
            'responsibilities'  => $responsibilities,
            'job_seeker_id'     => $job_seeker_id
        ]);


        //EDUCATION INSERT


        $school_name                = $req->school_name;
        $qualifications             = $req->qualifications;
        $edu_date                   = $req->edu_date;
        $achievements               = $req->achievements;

        $size_school_name =  sizeof($school_name)-1;

        for($i=0; $i<=$size_school_name; $i++){

            DB::table('jobseeker_education')->insertGetId([
           
                'school_name'       => $school_name[$i],
                'qualifications'    => $qualifications[$i],
                'edu_date'          => $edu_date[$i],
                'achievements'      => $achievements[$i],
                'job_seeker_id'     => $job_seeker_id
            ]);

        }


        


        //Jobseeker  email

       
        $mailmessage    = 'You have registrated successfully.';
        
        

        $subject = 'Jobseekers Registration';

        $mailData       = array('mailmessage'=>$mailmessage);
        $data           = array( 'email' => stripslashes($email), 'name' => stripslashes($name), 'subject' => $subject );
       
        Mail::send('layout.mail.jobseeker_welcome', $mailData, function ($message) use ($data) {
            //return $CandidateEmail;
            $message->from(env('EMAILFROM'), env('EMAILNAME'));
            //$message->to($CandidateEmail)->cc('bar@example.com');
            $message->to($data['email'], $name = $data['name']);
            $message->cc('daud.csbt@gmail.com', $name = 'Daud Khan');
            //$message->bcc($address, $name = null);
            //$message->replyTo($address, $name = null);
            $message->subject($data['subject']); 
        });




        return redirect()->back()->with('message', 'Jobseekers Registration Added');

    }

    


    public function validJobseekersLogin(Request $req){
       
         $email     =$req->username;
         $password = bcrypt($req->userpass);


        return $usertype = DB::table('users')->where('email','=',$email)->where('password','=',$password)->get();
        if ($usertype[0]->usertype == 'jobseeker') {
          return redirect()->back()->with('message', 'Jobseekers login');
        }else{
             return redirect()->back()->withInput()->with('message', 'Either email or password is wrong');

        }

        // $userdata = array(
        //     'email' => Input::get('username'),
        //     'password' => Input::get('userpass')
        // );

        // $remember = Input::has('remember') ? true:false;

        // if(Auth::attempt($userdata, $remember)){
                
        //     $data = array('pageTital'=>'jobseeker login');
        //    return Redirect::to('jobseekerLogin');

        // } else { 

            
        //         Session::flash('flash_message', 'Either email or password is wrong.');
        //         return redirect()->guest('admin');
        // }
        

       


    }


public function editjobseekerPersonalDetails(Request $req){


        $PerD_seeker_id        = $req->PerD_seeker_id;

        $FullName       = ($req->FullName);                                                
        $DOB            = $req->DOB;
        $location      = ($req->location);
        $resume_content   = ($req->resume_content);
        $image         = $req->file('image');
        $oldimage        = $req->oldimage;
        $MobileNumber   = ($req->MobileNumber);

      

        if($image){
            

            $destinationPath    ='jobseekerImage'; // upload path folder should be in public folder
             // upload 128*128

            $extension      = $image->getClientOriginalExtension(); // getting image extension
            $originalName   = $image->getClientOriginalName();
            $size           = $image->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName1);

            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldimage;
        }

       
       

        DB::table('jobseeker_persional')->where('job_seeker_id', '=', $PerD_seeker_id)->update([
            'name'              => $FullName,
            'location'          => $location,
            'image'             => $fileName1,
            'phone'             => $MobileNumber,
            'resume_content'    => $resume_content,
            'dob'               => $DOB
            
            
        ]);

        
        return redirect()->back()->with('message', 'Personal Details Updated.');

    }


 public function editjobseekerEducationDetails (Request $req) {
        $Edu_seeker_id              =$req->Edu_seeker_id;    
        $school_name                = $req->school_name;
        $qualifications             = $req->qualifications;
        $edu_date                   = $req->edu_date;
        $achievements               = $req->achievements;
        $oldresume                  = $req->oldresume;
        $resume                     = $req->file('resume');
        $achievements_arr           = array();



        if($resume){
            

            $destinationPath    ='jobseekerResume'; // upload path folder should be in public folder
           

            $extension      = $resume->getClientOriginalExtension(); // getting image extension
            $originalName   = $resume->getClientOriginalName();
            $size           = $resume->getSize();
            $fileName2      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='doc') || ($extension=='docx') || ($extension=='txt') || ($extension=='pdf'))&&($size<5000000)){

               
                //save original
                $resume->move($destinationPath, $fileName2);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB doc or txt or pdf file is allowed.' );
            }
        } else {
            $fileName2 = $oldresume;
        }

        //
        DB::table('jobseeker_education')->where('job_seeker_id', '=', $Edu_seeker_id)->delete();

        $size_school_name =  sizeof($school_name)-1;

        for($i=0; $i<=$size_school_name; $i++){

            DB::table('jobseeker_education')->insert([
           
                'school_name'       => $school_name[$i],
                'qualifications'    => $qualifications[$i],
                'edu_date'          => $edu_date[$i],
                'achievements'      => $achievements[$i],
                'job_seeker_id'     => $Edu_seeker_id
            ]);


        }

        


        

        return redirect()->back()->with('message', 'Educational Details Updated.');

 }

    public function downloadResume($filename){
        
        $pathToFile = 'jobseekerResume/'.$filename;
        return response()->download($pathToFile);
    }   

    public function editjobseekerExperienceDetails (Request $req) {
        $Exp_seeker_id              = $req->Exp_seeker_id;
        $designation                = $req->designation;
        $designation_arr            = array();
        $exp_date                   = $req->exp_date;
        $exp_date_arr               = array();
        $responsibilities           = $req->responsibilities;
        $responsibilities_arr       = array();
        $company_name               = $req->company_name;
        $company_name_arr           = array();
        foreach($company_name as $key=>$val){
            
            if($val != ''){
                array_push($company_name_arr,$val);
            }
        }
        $company_name    = implode(',', $company_name_arr);  
        

        foreach($designation as $key=>$val){
            
            if($val != ''){
                array_push($designation_arr,$val);
            }
        }
        $designation    = implode(',', $designation_arr);  

        foreach($exp_date as $key=>$val){
            
            if($val != ''){
                array_push($exp_date_arr,$val);
            }
        }
        $exp_date    = implode(',', $exp_date_arr);  

        foreach($responsibilities as $key=>$val){
            
            if($val != ''){
                array_push($responsibilities_arr,$val);
            }
        }
        $responsibilities    = implode(',', $responsibilities_arr);  


        DB::table('jobseeker_experience')->where('job_seeker_id', '=', $Exp_seeker_id)->update([
            'company_name'      => $company_name,
            'designation'       => $designation,
            'exp_date'          => $exp_date,
            'responsibilities'  => $responsibilities
            
        ]);
        return redirect()->back()->with('message', 'Experience Details Updated.');

    }
    public  function editjobseekerpassword(Request $req){
            
        $user_id                 = $req->user_id;

        $oldpassword             = $req->oldpassword;
        $newpassword             = $req->newpassword;
        $comformNewpassword      = $req->comformNewpassword;

        $inputs = [

            'oldpassword'        => $oldpassword,
            'newpassword'        => $newpassword,
            'comformNewpassword' => $comformNewpassword
            
        ];

        $rules = [

            'oldpassword'                  => 'required',
            'newpassword'                  => 'required',
            'comformNewpassword'           => 'required',
            
        ];

        $messages = [

            'oldpassword.required'          => 'Enter your old password.',
            'newpassword.required'          => 'Enter your new password.',
            'comformNewpassword.required'   => 'Retype your new password.',
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        if($newpassword != $comformNewpassword){
            return redirect()->back()->withInput()->with('singleerror', 'Password do not match.' );
        }


        //check old
        $hashedPassword = DB::table('users')->where('id','=', $user_id)->get();
        $hashedPassword = $hashedPassword[0]->password;

        
        $hashedNewPassword = bcrypt($req->newpassword);
        if (Hash::check($oldpassword, $hashedPassword)) {
            // The passwords match...
            DB::table('users')->where('id', $user_id)->update([

                'password'   => $hashedNewPassword
            
            ]);

        } else {
            return redirect()->back()->withInput()->with('singleerror', 'Wrong old password.' );
        }
        


        
        return redirect()->back()->with('message', 'Password updated.');

    }

    public function check_js_mail(Request $req){
        $mail =  $req->mail;
        return DB::table('users')->where('email', '=', $mail)->count();
    }

    public  function editjobseekersocialnetworkDetails(Request $req){
        $social_network       = $req->social_network;
        $url                  = $req->url;
        $Soc_seeker_id        = $req->Soc_seeker_id;
        if($social_network == ''){
            $social_network = '';
        } else {
            $social_network    = implode(',', $social_network);  
        }
        if($url == ''){
            $url = '';
        } else {
            $url    = implode(',', $url);  
        }



        DB::table('jobseeker_socialnetwork')->where('job_seeker_id', '=', $Soc_seeker_id)->update([
            'social_network'    => $social_network,
            'url'               => $url
            
        ]);
        return redirect()->back()->with('message', 'Social Network Details Updated.');

    }
    public function editjobseekerResume(Request $req){


        $PerD_seeker_id        = $req->PerD_seeker_id;

        
        $resume         = $req->file('resume');
        $oldresume        = $req->oldresume;
        

      

        if($resume){
            

            $destinationPath    ='jobseekerResume'; // upload path folder should be in public folder
           

            $extension      = $resume->getClientOriginalExtension(); // getting image extension
            $originalName   = $resume->getClientOriginalName();
            $size           = $resume->getSize();
            $fileName2      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='doc') || ($extension=='docx') || ($extension=='txt') || ($extension=='pdf'))&&($size<5000000)){

               
                //save original
                $resume->move($destinationPath, $fileName2);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB doc or txt or pdf file is allowed.' );
            }
        } else {
            $fileName2 = $oldresume  ;
        }

       
       

        DB::table('jobseeker_persional')->where('job_seeker_id', '=', $PerD_seeker_id)->update([
            'resume'              => $fileName2
            
            
            
        ]);

        
        return redirect()->back()->with('message', 'Resume Updated.');

    }






    public function savesubAdminProfile(Request $req){
       
        $name             = addslashes($req->name);
        $email            = $req->email;
        
       
        $inputs = [

            'name'      => $name,
            'email'     => $email
            
            
            
        ];

        $rules = [

            'name'        => 'required|max:50',
            'email'       => 'required'
            
        ];

        $messages = [

            'name.required'           => 'Please Enter Name.',
            'email.required'    => 'Please Enter Email.'
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
     

            $count= DB::table('users')->select('*')->count();
            if($count > 0){
            //update
            $admin_profile_id= DB::table('users')->select('id')->get();
            DB::table('users')->where('id', Auth::user()->id)->update([
            'name'          =>$name,
            'email'        =>$email
            
            ]);
            } else {
                  DB::table('users')->where('id', Auth::user()->id)->insert([
                    'name'          =>$name,
                    'email'        =>$email
                    
                    ]);
            }            

        return redirect()->back()->with('message', 'Saved Subadmin Profile.');

    }

    public function updatePassword(Request $req){
       
        
        // $old_pass                = $req->old_pass;
        $new_pass                = $req->new_pass;
        $re_new_pass             = $req->re_new_pass;
        
        
        
       
        $inputs = [

            // 'old_pass'            => $old_pass,
            'new_pass'            => $new_pass,
            're_new_pass'         => $re_new_pass,
            
            
            
        ];

        $rules = [

            // 'old_pass'          => 'required',
            'new_pass'          => 'required',
            're_new_pass'          => 'required'
        ];

        $messages = [

            // 'old_pass.required'             => 'Plefghfgh Name.',
            'new_pass.required'             => 'Please Enter New Password.',
            're_new_pass.required'          => 'Please Re-Enter Password.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

         if($new_pass != $re_new_pass){
            return redirect()->back()->withInput()->with('singleerror', 'Password do not match.' );
        }

        DB::table('users')->where('id', Auth::user()->id)->update([

            'password' =>bcrypt($new_pass)
            

        ]);
        
         

        return redirect()->back()->with('message', 'Password updated.');

    }
    


}
