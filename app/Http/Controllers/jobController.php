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
        $hashvalue = md5(1,999999);
       

        //Job recruiter send confirmation mail

        $mailmessage    = env('SITEURL').'recruiterregistration/'.$id.'/'.$hashvalue;
        $subject         = 'Recruiter Registration';

        $mailData       = array('mailmessage'=>$mailmessage);
        $data           = array( 'email' => stripslashes($email),'subject' => $subject );       
        Mail::send('layouts.mail.recruiter_registration_mail', $mailData, function ($message) use ($data) {
            //return $CandidateEmail;
            $message->from(env('EMAILFROM'), env('EMAILNAME'));
            //$message->to($CandidateEmail)->cc('bar@example.com');
            $message->to($data['email']);
            $message->cc('gupta.sandhya@intactinnovations.com');
            //$message->bcc($address, $name = null);
            //$message->replyTo($address, $name = null);
            $message->subject($data['subject']); 
        });
      

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
            'jobtitle'              => 'required|max:50',
            'location'              => 'required|max:50',
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
      

      
        DB::table('recruiter_jobdetailspost')->insert([

            'user_id'                =>$id,
            'email'                  =>$email,
            'jobtitle'               =>$jobtitle,
            'location'               =>$location,
            'jobregion'              =>$jobregion,
            'jobtype'                =>$jobtype,
            'jobcategory'            =>$jobcategory,
            'jobdescription'         =>$jobdescription,
            'joburl'                 =>$joburl
           
            
           
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

        


        return redirect()->back()->withInput()->with('message', 'Thank you for Job Post.');
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
