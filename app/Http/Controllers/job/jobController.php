<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\job;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination;
use Illuminate\Support\Collection;
use Input;
use App\User;
use Hash;
use File;
use Auth;
use Session;
use View;
use Mail;





class jobController extends Controller
{

     /*job post for recruiter*/

    public function insertJobs(Request $res){
        
        /*JOB DETAILS*/
        $category_id             = $res->category_id;
        $sub_category_id         = $res->sub_category_id;
        $jobTitle                = addslashes($res->jobTitle);
        $country                 = $res->country;
        $state                   = $res->state;
        $city                    = $res->city;
        // $jobDescription          = addslashes($res->jobDescription);
        $requirements            = $res->requirements;
        $experiance              = $res->experiance;
        $salary_budget           = $res->salary_budget;
        $keySkill                = $res->keySkill;

         /*COMPANY DETAILS*/
        $companyName        = $res->companyName;
        $mobileNumber1      = $res->mobileNumber1;
        $mobileNumber2      = $res->mobileNumber2;
        $companyDescription = addslashes($res->companyDescription);
        $companywebsite     = $res->companywebsite;

      
        $industries         = $res->industries;
        $companyRole        =$res->companyRole;
        $logo               = $res->file('logo');

        /*extra*/
        // $arr_requirment     = $res->requirment;
        // $arr_benefits       = $res->benefits;
        // $experience         = $res->experience;
        // $minsal             = $res->minsal;
        // $maxsal             = $res->maxsal;
        // $ContactEmail       = $res->ContactEmail;
        // $ContactPersonName  = $res->ContactPersonName;
        // $ContactPhone  = $res->ContactPhone;
        // $weburl  = $res->weburl;
        // $keySkills  = $res->keySkills;
        


        $inputs = [

            'category_id'           => $category_id,
            'sub_category_id'       => $sub_category_id,
            'jobTitle'              => $jobTitle,
            'country'               => $country,
            'state'                 => $state,
            'city'                  => $city,
            'requirements'          => $requirements,
            'experiance'            => $experiance,
            'salary_budget'         => $salary_budget,
            'keySkill'              => $keySkill,
            'companyName'           => $companyName,
            'mobileNumber1'         => $mobileNumber1,
            'mobileNumber2'         => $mobileNumber2,
            'companyDescription'    => $companyDescription,
            'companywebsite'        => $companywebsite,
            'industries'            => $industries,
            'companyRole'           => $companyRole,
            'logo'                  => $logo,

            
            
            
        ];

        $rules = [
            
            'category_id'         =>'required',
            'sub_category_id'     =>'required',
            'jobTitle'            =>'required',
            'country'             =>'required',
            'state'               =>'required',
            'city'                =>'required',
            'requirements'        =>'required',
            'experiance'          =>'required',
            'salary_budget'       =>'required',
            'companyName'         =>'required',            
            'mobileNumber1'       =>'required',
            'mobileNumber2'       =>'required',
            'companyDescription'  =>'required',
            'companywebsite'      =>'required',
            'industries'          =>'required',
            'companyRole'         =>'required',
            'logo'                =>'required'
            
        ];

        // $messages = [
            // 'email.required'                => 'Please enter email',
            // 'jobTitle.required'             => 'Please enter job title',
        //     'jobTitle.unique'               => 'Job title already exist',
        //     'location.required'             => 'Please enter job location',
        //     'jobDescription.required'       => 'Please enter job description',  
        //     'region.required'               => 'Please enter region',
        //     'jobType.required'              => 'Please select job type',
        //     'jobCategory.required'          => 'Please select job category',
        //     // 'applicationURL.required'           => 'Please select job category',
        //     'companyName.required'          => 'Please enter company name',
        //     'tagline.required'              => 'Please enter tagline ',
        //     'companyDescription.required'   => 'Please enter company description',
        //     'logo.required'                 => 'Please upload logo image',
            
            
           
        // ];

        $validation = Validator::make($inputs, $rules);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }


        // $newsExist = DB::table('job')->select('*')->where('jobTitle', '=', $jobTitle)->count();
        // if($newsExist > 0){
        //     return redirect()->back()->withInput()->with('singleerror', 'Duplicate job Title.' );
        // }

        

        // Page image 


        if($logo){
            

            $destinationPath    ='companysLogo'; // upload path folder should be in public folder
            $thumb160x160       ='companysLogo/thumb160x160'; // upload 128*128
            

            $extension      = $logo->getClientOriginalExtension(); // getting image extension
            $originalName   = $logo->getClientOriginalName();
            $size           = $logo->getSize();
            $fileName      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($logo,array(
                    'width' => 160,
                    'height' =>160,
                    'crop' => true
                ))->save($thumb160x160.'/'.$fileName);
                //save original
                Image::make($logo)->save($destinationPath.'/'.$fileName);

            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = '';
        }


        
        //return $newsTitle;
            DB::table('job_post')->insert([
            'category_id'             => $category_id,
            'sub_category_id'         => $sub_category_id,
            'jobTitle'                => $jobTitle,
            'country'                 => $country,
            'state'                   => $state,
            'city'                    => $city,
            'requirements'            => $requirements,
            'experiance'              => $experiance,
            'salary_budget'           => $salary_budget,
            'keySkill'                => $keySkill,
            'companyName'             => $companyName,
            'mobileNumber1'           => $mobileNumber1,
            'mobileNumber2'           => $mobileNumber2,
            'companyDescription'      =>$companyDescription,
            'companywebsite'          =>$companywebsite,
            'industries'              => $industries,
            'companyRole'             => $companyRole,
            'logo'                    => $fileName
        ]);

        return redirect()->back()->with('message', 'Job Posted.');


      }




        public function job_delete($id){

                DB::table('job_post')->where('id', $id)->delete([

                      'id'   => $id,
                ]);

        return redirect()->back()->with('message', 'job list delete');

     


      }



     public function recruiter_update(Request $res){
        
        /*JOB DETAILS*/
        $id                      = $res->recruiterr_id;
        $category_id             = $res->category_id;
        $sub_category_id         = $res->sub_category_id;
        $jobTitle                = addslashes($res->jobTitle);
        $country                 = $res->country;
        $state                   = $res->state;
        $city                    = $res->city;
        $requirements            = $res->requirements;
        $experiance              = $res->experiance;
        $salary_budget           = $res->salary_budget;
        $keySkill                = $res->keySkill;

         /*COMPANY DETAILS*/
        $companyName        = $res->companyName;
        $mobileNumber1      = $res->mobileNumber1;
        $mobileNumber2      = $res->mobileNumber2;
        $companyDescription = addslashes($res->companyDescription);
        $companywebsite     = $res->companywebsite;

      
        $industries    = $res->industries;
        $companyRole        =$res->companyRole;
        $logo               = $res->file('logo');

        /*extra*/
        // $arr_requirment     = $res->requirment;
        // $arr_benefits       = $res->benefits;
        // $experience         = $res->experience;
        // $minsal             = $res->minsal;
        // $maxsal             = $res->maxsal;
        // $ContactEmail       = $res->ContactEmail;
        // $ContactPersonName  = $res->ContactPersonName;
        // $ContactPhone  = $res->ContactPhone;
        // $weburl  = $res->weburl;
        // $keySkills  = $res->keySkills;
        


        // $inputs = [

        //     'category_id'           => $category_id,
        //     'sub_category_id'       => $sub_category_id,
        //     'jobTitle'              => $jobTitle,
        //     'country'               => $country,
        //     'state'                 => $state,
        //     'city'                  => $city,
        //     'jobDescription'        => $jobDescription,
        //     'region'                => $region,
        //     'requirements'          => $requirements,
        //     'experiance'            => $experiance,
        //     'salary_budget'         => $salary_budget,
        //     'keySkill'              => $keySkill,
        //     'companyName'           => $companyName,
        //     'MobileNumber1'         => $MobileNumber1,
        //     'companyDescription'    => $companyDescription,
        //     'companywebsite'        => $companywebsite,
        //     'skills'                => $skills,
        //     'industries'            => $industries,
        //     'companyRole'           => $companyRole,
        //     'logo'                  => $logo,

            
            
            
        // ];

        // $rules = [
            
        //     'category_id'       =>'required',
        //     'sub_category_id'   =>'required',
        //     'jobTitle'          =>'required',
        //     'jobDescription'    =>'required',            
        //     'country'           =>'required',
        //     'state'             =>'required',
        //     'city'              =>'required',
        //     'companyName'       =>'required',
        //     'logo'              =>'required'
            
        // ];

        // $messages = [
        //     'email.required'                => 'Please enter email',
        //     'jobTitle.required'             => 'Please enter job title',
        //     'jobTitle.unique'               => 'Job title already exist',
        //     'location.required'             => 'Please enter job location',
        //     'jobDescription.required'       => 'Please enter job description',  
        //     'region.required'               => 'Please enter region',
        //     'jobType.required'              => 'Please select job type',
        //     'jobCategory.required'          => 'Please select job category',
        //     // 'applicationURL.required'           => 'Please select job category',
        //     'companyName.required'          => 'Please enter company name',
        //     'tagline.required'              => 'Please enter tagline ',
        //     'companyDescription.required'   => 'Please enter company description',
        //     'logo.required'                 => 'Please upload logo image',
            
            
           
        // ];

        // $validation = Validator::make($inputs, $rules , $messages);

        // if( $validation->fails() ){
        //     return redirect()->back()->withInput()->with('errors', $validation->errors() );
        // }


        // $newsExist = DB::table('job')->select('*')->where('jobTitle', '=', $jobTitle)->count();
        // if($newsExist > 0){
        //     return redirect()->back()->withInput()->with('singleerror', 'Duplicate job Title.' );
        // }

        
        

        // Page image 


        if($logo){
            

            $destinationPath    ='companysLogo'; // upload path folder should be in public folder
            $thumb160x160       ='companysLogo/thumb160x160'; // upload 128*128
            

            $extension      = $logo->getClientOriginalExtension(); // getting image extension
            $originalName   = $logo->getClientOriginalName();
            $size           = $logo->getSize();

            $fileName      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($logo,array(
                    'width' => 600,
                    'height' => 300,
                    'crop' => true
                ))->save($thumb160x160.'/'.$fileName);
                //save original
                Image::make($logo)->save($destinationPath.'/'.$fileName);

            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = '';
        }


        
        //return $newsTitle;
            DB::table('job_post')
            ->where('id', $id)
            ->update([
            'category_id'           => $category_id,
            'sub_category_id'       => $sub_category_id,
            'jobTitle'              => $jobTitle,
            'country'               => $country,
            'state'                 => $state,
            'city'                  => $city,
            'requirements'          => $requirements,
            'experiance'            => $experiance,
            'salary_budget'         => $salary_budget,
            'keySkill'              => $keySkill,
            'companyName'           => $companyName,
            'mobileNumber1'         => $mobileNumber1,
            'mobileNumber2'         => $mobileNumber2,
            'companyDescription'    =>$companyDescription,
            'companywebsite'        =>$companywebsite,
            'industries'            => $industries,
            'companyRole'           => $companyRole,
            'logo'                  => $fileName
        ]);

       return redirect()->back()->with('message', ' Job Post Updated.');


    }










    public function resume_post(Request $res){
        
        /*JOB DETAILS*/
        //$id                      = $res->id;
        $name                    = $res->name;
        $title                   = addslashes($res->title);
        $video                   = $res->video;
        $email                   = $res->email;
        $job_category            = $res->job_category;
        $country                 = $res->country;
        $state                   = $res->state;

        $city                    = $res->city;

        $skill                   = $res->skill;
        $resume_content          = $res->resume_content;
        $choose_network          = $res->choose_network;
        $url                     = $res->url;

         /*COMPANY DETAILS*/
        $employer                = $res->employer;
        $date                    = $res->date;
        $end_date                = $res->end_date;
        $job_title               = $res->job_title;
        $responsibilities        = addslashes($res->responsibilities);
        $school_name             = $res->school_name;

        $s_date                  = $res->s_date;
        $qualification           = $res->qualification;
        $notes                   =$res->notes;
        $jobseeker_image         = $res->file('jobseeker_image');
        $update_resume           = $res->file('update_resume');
        $update_resume           = $res->update_resume;
        
       
        

        // Page image 


        if($jobseeker_image){
            

            $destinationPath ='jobseekerImage'; // upload path folder should be in public folder
            $thumb160x160 ='jobseekerImage/thumb160x160';
            $thumb501x248 ='jobseekerImage/thumb501x248';
            $extension = $jobseeker_image->getClientOriginalExtension(); // getting image extension
            $originalName = $jobseeker_image->getClientOriginalName();
            $size = $jobseeker_image->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($jobseeker_image,array(
                    'width' => 160,
                    'height' => 160,
                    'crop' => true
                ))->save($thumb160x160.'/'.$fileName);
                Image::make($jobseeker_image,array(
                    'width' => 501,
                    'height' => 248,
                    'crop' => true
                ))->save($thumb501x248.'/'.$fileName);
                //save original
                Image::make($jobseeker_image)->save($destinationPath.'/'.$fileName);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = " ";
        }

        // Resume Post
            if($update_resume){
            

            $destinationPath ='jobseekerImage/resume'; // upload path folder should be in public folder
            //$resume ='jobseekerImage/resume';
            //$thumb501x248 ='jobseekerImage/thumb501x248';
            $extension = $update_resume->getClientOriginalExtension(); // getting image extension
            $originalName = $update_resume->getClientOriginalName();
            $size = $update_resume->getSize();
            $fileName1 = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='pdf') || ($extension=='doc') || ($extension=='docx'))&&($size<5000000)){
                //$document->move($destinationPath, $fileName);
                $update_resume->move($destinationPath.'/'.$fileName1);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = " ";
        }


        
        //return $newsTitle;
            DB::table('resume_post')->insert([
            'name'                   => $name,
            'title'                  => $title,
            'video'                  => $video,
            'email'                  => $email,
            'job_category'           => $job_category,
            'country'                => $country,
            'state'                  => $state,
            'city'                   => $city,

            'skill'                  => $skill,
            'resume_content'         => $resume_content,
            'choose_network'         => $choose_network,
            'url'                    => $url,
            'employer'               => $employer,
            'date'                   => $date,
            'end_date'               => $end_date,

            'job_title'              => $job_title,
            'responsibilities'       =>$responsibilities,
            
            'school_name'            =>$school_name,
            's_date'                 => $s_date,
            'qualification'          => $qualification,
            
            'notes'                  => $notes,
            'file'                   => $fileName,
            'update_resume'          => $fileName1

     ]);

        return redirect()->back()->with('message', 'Job Posted.');


     }



    public function resume_delete($id){

    DB::table('resume_post')->where('id', $id)->delete([

            
           
            'video'              => $video,
            // 'email'              => $email,
            'job_category'       => $job_category,
            'country'            => $country,
            'state'              => $state,
            'city'               => $city,

            'skill'              => $skill,
            'resume_content'     => $resume_content,
            'choose_network'     => $choose_network,
            'url'                => $url,
            'employer'           => $employer,
            'date'               => $date,
            'end_date'           => $end_date,

            'job_title'          => $job_title,
            'responsibilities'   =>$responsibilities,
            
            'school_name'        =>$school_name,
            's_date'             => $s_date,
            'e_date'             => $e_date,
            'qualification'      => $qualification,
            
            'notes'              => $notes,
            'file'                => $fileName,
            'update_resume'      => $fileName1

            
    ]);

    return redirect()->back()->with('message', 'Resume list delete');

    }




    public function jobseeker_resume_update(Request $res){

       

        /*JOB DETAILS*/
        $id                      = $res->jobseeker_id;
        $firstname               = $res->firstname;
        $lastname                = $res->lastname;
        $title                   = addslashes($res->title);
        $video                   = $res->video;
        // $email                   = $res->email;
        $job_category            = $res->job_category;
        $country                 = $res->country;
        $state                   = $res->state;

        $city                    = $res->city;

        $skill                   = $res->skill;
        $resume_content          = $res->resume_content;
        $choose_network          = $res->choose_network;
        $url                     = $res->url;

         /*COMPANY DETAILS*/
        $employer                = $res->employer;
        $date                    = $res->date;
        $end_date                = $res->end_date;

        $job_title               = $res->job_title;
        $responsibilities        = addslashes($res->responsibilities);
        $school_name             = $res->school_name;

        $s_date                  = $res->s_date;
        $e_date                  = $res->e_date;

        $qualification           = $res->qualification;
        $notes                   = $res->notes;
        $jobseeker_image         = $res->file('jobseeker_image');
        $update_resume           = $res->file('update_resume');
        $update_resume           = $res->update_resume;


        

        if($jobseeker_image){
            

            $destinationPath ='jobseekerImage'; // upload path folder should be in public folder
            $thumb160x160 ='jobseekerImage/thumb160x160';
            $thumb501x248 ='jobseekerImage/thumb501x248';
            $extension = $jobseeker_image->getClientOriginalExtension(); // getting image extension
            $originalName = $jobseeker_image->getClientOriginalName();
            $size = $jobseeker_image->getSize();
            $fileName = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){

                Image::make($jobseeker_image,array(
                    'width' => 160,
                    'height' => 160,
                    'crop' => true
                ))->save($thumb160x160.'/'.$fileName);
                Image::make($jobseeker_image,array(
                    'width' => 501,
                    'height' => 248,
                    'crop' => true
                ))->save($thumb501x248.'/'.$fileName);
                //save original
                Image::make($jobseeker_image)->save($destinationPath.'/'.$fileName);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName = " ";
        }

        // Resume Post
            if($update_resume){
            

            $destinationPath ='jobseekerImage/resume';
             // $thumb160x160 ='jobseekerImage/resume/thumb160x160'; // upload path folder should be in public folder
            //$resume ='jobseekerImage/resume';
            //$thumb501x248 ='jobseekerImage/thumb501x248';
            $extension = $update_resume->getClientOriginalExtension(); // getting image extension
            $originalName = $update_resume->getClientOriginalName();
            $size = $update_resume->getSize();
            $fileName1 = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='pdf') || ($extension=='doc') || ($extension=='docx'))&&($size<5000000)){
                //$document->move($destinationPath, $fileName);
                $update_resume->move($destinationPath,$fileName1);
                       // return response()->download($destinationPath.'/'.$fileName1);

                // Image::make($update_resume,array(
                //     'width' => 160,
                //     'height' => 160,
                //     'crop' => true
                // ))->save($thumb160x160.'/'.$fileName1);
                //  Image::make($update_resume)->save($destinationPath.'/'.$fileName1);
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = " ";
        }
      

       $resume=DB::table('resume_post')
            ->where('id', $id)
            ->update([
             'id'                => $id,
            'firstname'               => $firstname,
             'lastname'               => $lastname,
            'title'              => $title,
            'video'              => $video,
            // 'email'              => $email,
            'job_category'       => $job_category,
            'country'            => $country,
            'state'              => $state,
            'city'               => $city,

            'skill'              => $skill,
            'resume_content'     => $resume_content,
            'choose_network'     => $choose_network,
            'url'                => $url,
            'employer'           => $employer,
            'date'               => $date,
            'end_date'           => $end_date,

            'job_title'          => $job_title,
            'responsibilities'   =>$responsibilities,
            
            'school_name'        =>$school_name,
            's_date'             => $s_date,
            'e_date'             => $e_date,
            'qualification'      => $qualification,
            
            'notes'              => $notes,
            'file'                => $fileName,
            'update_resume'      => $fileName1

                    
            ]);

 // return $choose_network[0].$choose_network[1];
            
     for ($i=0; $i < sizeof($choose_network); $i++) { 
            DB::table('social_network')->where('id', $id)
            ->update([
            
            'choose_network'     => $choose_network[$i],
            'url'                => $url[$i],
            'user_id'                => $user_id
            ]);
        }
       
            return redirect('jobseeker/viewdetail')->with('message', 'resume Updated.');

       // return redirect('jobseeker/resume_update')->with('message', 'resume Updated.');

    }




       public function AdminProfile(Request $req){
       
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

