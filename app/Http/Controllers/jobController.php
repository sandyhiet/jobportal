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
use Mail;
use Image;
use IitplMailer;

class jobController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function jobseekerRegistartion(Request $req){

        //return 'adfert';
    
        $firstname                    = $req->firstname;
        $lastname                     = $req->lastname;
        $email                        = $req->email;
        $password                     = $req->password;
        $repassword                   = $req->confirmpassword;
        $status                       = $req->status;


        $inputs = [
            
            'firstname'           => $firstname,
            'lastname'            => $lastname,
            'email'               => $email,
            'password'            => $password,
            'repassword'          => $repassword,
        ];
       
        $rules = [

            'firstname'           => 'required',
            'lastname'            => 'required',
            'email'               => 'required|email|unique:users|max:50',
            'password'            => 'required|same:repassword',
           
        ];

        

        $validation = Validator::make($inputs, $rules);
        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
       
        //  if( $validation->fails() ){
        //     return $validation->errors();
        // }

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


       // return '1';
        
        return redirect()->back()->withInput()->with('message', 'Thank you for Registration');
    }

    public function saverecruiterRegistration(Request $req){

    
        $companyname                  = $req->companyname;
        $email                        = $req->email;
        $password                     = $req->password;
        $repassword                   = $req->repassword;
        $mobile                       = $req->mobile;


        $inputs = [
            
            'companyname'           => $companyname,
            'email'                 => $email,
            'password'              => $password,
            'repassword'            => $repassword,
            'mobile'                => $mobile,
        ];
       
        $rules = [

            'companyname'           => 'required|max:50',
            'email'                 => 'required|email|unique:users|max:50',
            'password'              => 'required|same:repassword|max:15',
            'mobile'                => 'required|max:11',
           
        ];
        $messages = [

            'companyname.required'  => 'This field is required.',
            'email.required'  => 'The email field is required.',
            'email.unique'  => 'This email already exits.',
            'password.required'  => 'The password field is required.',
            'mobile.required'  => 'The mobile field is required.'
            
        ];

        

         $validation = Validator::make($inputs, $rules, $messages);
        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
      

        $password                     = bcrypt($req->password);

        $user_id = DB::table('users')->insertGetId([

            
            'email'                  =>$email,
            'password'               =>$password,
            'usertype'              =>'jobrecruiter'
            
           
        ]);
      
  
        DB::table('jobrecruiter_profile')->insert([

            'companyname'             =>$companyname,
            'contact_no'              =>$mobile,
            'user_id'                 =>$user_id
            
           
        ]);

        $user_id = DB::table('users')->select('*')->where('email','=',$email)->get();
        $id = $user_id[0]->id;
        $hashvalue = md5(999999);
       

        //Job recruiter send confirmation mail

        $mailmessage    = env('SITEURL').'recruiterregistration/'.$id.'/'.$hashvalue;
        $mailmessage1    =  'Please click the following link to activate your Account';
        $subject         = 'Activate your Application Account';

        $mailData       = array('mailmessage'=>$mailmessage, 'mailmessage1'=>$mailmessage1);
        $data           = array('email' => stripslashes($email),'subject' => $subject );  

        $recruiterregistersendmail ='layouts.mail.recruiter_registration_mail';
        IitplMailer::sendemailwithoutname($recruiterregistersendmail,$mailData,$data);



        return redirect()->back()->withInput()->with('message', 'Registration link is send to your email.');
    }

    public function recruiterjobpost(Request $req){

    
        $id                         = $req->id;
        $email                      = $req->email;
        $jobtitle                   = $req->jobtitle;
        $location                   = $req->location;
        $jobregion                  = $req->jobregion;
        $jobtype                    = $req->jobtype;
        $jobcategory                = $req->jobcategory;
        $jobdescription             = $req->jobdescription;
        $joburl                     = $req->joburl;
        $featuredjob                = $req->featuredjob;

        $companyname                = $req->companyname;
       


        $inputs = [
          
            'email'                 => $email,
            'jobtitle'              => $jobtitle,
            'location'              => $location,
            'jobregion'             => $jobregion,
            'jobtype'               => $jobtype,
            'jobcategory'           => $jobcategory,
            'joburl'                => $joburl,
            'companyname'           => $companyname,
        ];
       
        $rules = [
            
            'email'                 => 'required|email|max:50',
            'jobtitle'              => 'required|max:25',
            'location'              => 'required|max:20',
            'jobregion'             => 'required',
            'jobtype'               => 'required',
            'jobcategory'           => 'required',
            'joburl'                => 'required|max:100',
            'companyname'           => 'required|max:50',
           
        ];
        $messages = [
            
            'email.required'          => 'The email field is required.',
            'jobtitle.required'       => 'This field is required.',
            'location.required'       => 'This field is required.',
            'jobregion.required'      => 'This field is required.',
            'jobtype.required'        => 'This field is required.',
            'jobcategory.required'    => 'This field is required.',
            'joburl.required'         => 'This field is required.',
            'companyname.required'    => 'This field is required.',
            
        ];

        

         $validation = Validator::make($inputs, $rules, $messages);
        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
      

      
       $job_id = DB::table('recruiter_jobdetailspost')->insertGetId([

            'user_id'                =>$id,
            'email'                  =>$email,
            'jobtitle'               =>$jobtitle,
            'location'               =>$location,
            'jobregion'              =>$jobregion,
            'jobtype'                =>$jobtype,
            'jobcategory'            =>$jobcategory,
            'jobdescription'         =>$jobdescription,
            'joburl'                 =>$joburl,
            'featuredjob'            =>$featuredjob
           
            
           
        ]);
        
        $companytagline                   = $req->companytagline;
        $companydescription               = $req->companydescription;
        $video_url                        = $req->video_url;
        $website_url                      = $req->website_url;
        $google_username                  = $req->google_username;
        $facebook_username                = $req->facebook_username;
        $linkedin_username                = $req->linkedin_username;
        $twitter_username                 = $req->twitter_username;
       
        $company_logo          = $req->file('company_logo');


        if($company_logo){
            
            $destinationPath    ='jobpostimage'; // upload path folder should be in public folder
            $thumb220x100       ='jobpostimage/thumb220x100'; // upload 128*128
            $thumb60x60         ='jobpostimage/thumb60x60';
            $thumb332x120       ='jobpostimage/thumb332x120';
            $thumb400x265       ='jobpostimage/thumb400x265';
            
            $extension      = $company_logo->getClientOriginalExtension(); // getting image extension
            $originalName   = $company_logo->getClientOriginalName();
            $size           = $company_logo->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png'))&&($size<5000000)){

                Image::make($company_logo,array(
                    'width' => 220,
                    'height' => 100,
                    'crop' => true
                ))->save($thumb220x100.'/'.$fileName1);
                Image::make($company_logo,array(
                    'width' => 60,
                    'height' => 60,
                    'crop' => true
                ))->save($thumb60x60.'/'.$fileName1);
                Image::make($company_logo,array(
                    'width' => 332,
                    'height' => 120,
                    'crop' => true
                ))->save($thumb332x120.'/'.$fileName1);

                Image::make($company_logo,array(
                    'width' => 400,
                    'height' => 265,
                    'crop' => true
                ))->save($thumb400x265.'/'.$fileName1);
                //save original
                Image::make($company_logo)->save($destinationPath.'/'.$fileName1);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }

        } else {
            
            $fileName1 = '';
        }
      
  
        DB::table('recruiter_companydetailspost')->insert([
            
            'user_id'                 =>$id,
            'job_id'                  =>$job_id,
            'companyname'             =>$companyname,
            'companytagline'          =>$companytagline,
            'companydescription'      =>$companydescription,
            'video_url'               =>$video_url,
            'website_url'             =>$website_url,
            'google_username'         =>$google_username,
            'facebook_username'       =>$facebook_username,
            'linkedin_username'       =>$linkedin_username,
            'twitter_username'        =>$twitter_username,
            'company_logo'            =>$fileName1
            
           
        ]);

        $mailData = array(
            'mailmessage' => 'Recruiter job post under approval.',
            'name' => ucfirst($companyname),
            'email'         => $email,
            'location' => ucfirst($location),
            'jobtitle' => ucfirst($jobtitle),
        );

        $subject = 'Recruiter Post New Job';
        $email   = env('ADMINEMAIL1');
        $data = array('email' => $email, 'subject' => $subject );


        $welcomerecruitermailpage ='layouts.mail.welcometojobpost';
        IitplMailer::sendemailwithoutname($welcomerecruitermailpage,$mailData,$data);


        return redirect()->back()->withInput()->with('message', 'Thank you for Job Post.');
    }
    


    public function deleteRecruiterProfile($user_id){

     DB::table('users')->where('users.id', $user_id)->delete();
     DB::table('jobrecruiter_profile')->where('jobrecruiter_profile.user_id', $user_id)->delete();
     return redirect()->back()->with('message', 'One recoard deleted.'); 

    }

    public function approve_recruiterjobpost($id){

     $membership = DB::table('recruiter_jobdetailspost')->where('recruiter_jobdetailspost.id', '=', $id)
                ->update([
                    'status'=>'1'
                ]);

        $recruiterpost_email = DB::table('recruiter_jobdetailspost')->select('*')->where('recruiter_jobdetailspost.id', '=', $id)
                ->get();
        $recruiter_companyname= DB::table('recruiter_companydetailspost')->select('*')->where('job_id','=',$recruiterpost_email[0]->id)->get();

        //Trigger email
        $email = $recruiterpost_email[0]->email;
        $companyname = $recruiter_companyname[0]->companyname;

    
        $mailData = array(
            'mailmessage' => 'Your Job Post is Approved.',
            'name' => ucfirst($companyname),
            'email'         => $email,
        );

        $subject = 'Recruiter Job Post Approval';
            
        $data = array('email' => $email, 'subject' => $subject );


        $recruitermailpage ='layouts.mail.recruiterjobpostApproved';
        IitplMailer::sendemailwithoutname($recruitermailpage,$mailData,$data);
       
      
       return redirect('admin/all_recruiterjobpost')->with('message', 'Job Approved');


    }

    public function reject_recruiterjobpost($id){

      

        $membership = DB::table('recruiter_jobdetailspost')->where('recruiter_jobdetailspost.id', '=', $id)
                ->update([
                    'status'=>'0'
                ]);

        $recruiterpost_email = DB::table('recruiter_jobdetailspost')->select('*')->where('recruiter_jobdetailspost.id', '=', $id)
                ->get();
        $recruiter_companyname= DB::table('recruiter_companydetailspost')->select('*')->where('job_id','=',$recruiterpost_email[0]->id)->get();

        //Trigger email
        $email = $recruiterpost_email[0]->email;
        $companyname = $recruiter_companyname[0]->companyname;
        
        $mailData = array(
            'mailmessage' => 'We review your post job but job is rejected for some reason.',
            'name' => ucfirst($companyname),
            'email'         => $email,
        );

        $subject = 'Job Post Reject';
            
        $data = array( 'email' => $email, 'subject' => $subject );

        $recruiterrejectedmailpage ='layouts.mail.recruiterjobpostRejected';
        IitplMailer::sendemailwithoutname($recruiterrejectedmailpage,$mailData,$data);
       
       
        return redirect('admin/all_recruiterjobpost')->with('message', 'Job Post Rejected');


    }


    public function deleteRecruiterPostjob($id){

        DB::table('recruiter_jobdetailspost')->where('recruiter_jobdetailspost.id', $id)->delete();
        $getcompanyImage = DB::table('recruiter_companydetailspost')->where('recruiter_companydetailspost.job_id', $id)->get();
        $companyImage = $getcompanyImage[0]->company_logo;
        DB::table('recruiter_companydetailspost')->where('recruiter_companydetailspost.job_id', $id)->delete();

         unlink("jobpostimage/".$companyImage);
         unlink("jobpostimage/thumb220x100/".$companyImage);
         unlink("jobpostimage/thumb60x60/".$companyImage);
         unlink("jobpostimage/thumb332x120/".$companyImage);
         unlink("jobpostimage/thumb400x265/".$companyImage);
   

      return redirect()->back()->with('message', 'One recoard deleted.'); 

    }






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
