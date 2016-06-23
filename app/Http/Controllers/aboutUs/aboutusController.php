<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\aboutUs;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use Auth;
use Mail;



class aboutusController extends Controller
{
   


    public function saveWelcomeContent(Request $req){
       
        $title                = addslashes($req->title);
        $subtitle             = addslashes($req->subtitle);
        $content              = addslashes($req->content);
        $contentImage         = $req->file('contentImage');
        $oldcontentImage      = $req->oldcontentImage;
        $link                 = $req->link;
       

        $inputs = [

            'title'            => $title,
            'subtitle'         => $subtitle,
            'content'          => $content,
            'link'             => $link
            
            
        ];

        $rules = [

            'title'          => 'required|max:50',
            'subtitle'       => 'required',
            'content'        => 'required',
            'link'           => 'required'   
        ];

        $messages = [

            'title.required'           => 'Please Enter Title.',
            'subtitle.required'        => 'Please Enter Subtitle.',
            'content.required'         => 'Please Enter Content.',
            'link.required'            => 'Please Select Link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Welcome Content Image  


        if($contentImage){
            

            $destinationPath    ='welcomeImage'; // upload path folder should be in public folder
            $thumb704X250       ='welcomeImage/thumb704X250'; // upload 128*128

            $extension      = $contentImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $contentImage->getClientOriginalName();
            $size           = $contentImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($contentImage,array(
                    'width' => 704,
                    'height' => 250,
                    'crop' => true
                ))->save($thumb704X250.'/'.$fileName1);

               
                //save original
                Image::make($contentImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldcontentImage;
        }


            $count= DB::table('about_us')->select('*')->count();
            if($count > 0){
            //update
            $welcome_content_id= DB::table('about_us')->select('id')->get();
            DB::table('about_us')->where('id', $welcome_content_id[0]->id)->update([
            'title'=>$title,
            'subtitle'=>$subtitle,
            'content'=>$content,
            'image'=>$fileName1,
            'link'=>$link

            ]);
            } else {
           DB::statement('call welcomeContent("'.$title.'", "'.$subtitle.'", "'.$content.'", "'.$fileName1.'", "'.$link.'")');
            }            

        return redirect()->back()->with('message', 'Saved Welcome Content.');

    }



    public function post_contactus_query_from(Request $req){
        $name        = $req->name;
        $email       = $req->email;
        $subject     = $req->subject;
        $feedback    = $req->feedback;
        
 
       

        $inputs = [
            'name'         => $name,
            'email'        => $email,
            'subject'        => $subject,
            'feedback'      => $feedback
        ];
    

        $rules = [
            'name'        => 'required|max:30',
            // 'phone'       => 'required|digits_between:6,12',
            'email'       => 'required|email|max:50',
            'feedback'     => 'required|max:500'
        ];

        $messages = [
            'name.required'     => 'Please Enter Your Name',
            'email.required'    => 'Please Enter Valid Email',
            'feedback.required'    => 'Please Enter Your Message',
            
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return $validation->errors();
        }

         // $phone1 = $extention.'-'.$phone;

        DB::table('contactus_queries')->insert([
            'name'=>$name,
            'email'=>$email,
            'subject'=>$subject,
            'feedback'=>$feedback,
        ]);

        //notify Admin
        
        $datasendtomail = array(
            'name'     => $name, 
            'email'      => $email,
            'enqmessage'   => $feedback,
        );
        $data = array( 
            'subject' => 'New Enquiry - Job Portal',
            'email' => $email
        );

        Mail::send('layout.mail.contact_us_mail',
                $datasendtomail, function ($message) use ($data) 
            {
                $message->from(env('EMAILFROM'), env('EMAILNAME'));
                $message->to($data['email'], env('ADMINEMAIL1'), $name = env('ADMINNAME1'));
                $message->bcc(env('ADMINEMAIL1'), $name = env('ADMINNAME1'));
                $message->bcc(env('ADMINEMAIL2'), $name = env('ADMINNAME2'));
                $message->subject($data['subject']); 
            });


        return '1';

    }


    public function saveFeaturedContent(Request $req){

       
        $title                = addslashes($req->title);
        $content              = addslashes($req->content);
        $contentImage         = $req->file('contentImage');
        $oldcontentImage      = $req->oldcontentImage;
        $link                 = $req->link;
        $id                   = $req->id;


      
        
        $title = str_replace(' ', '_', $title); // Replaces all spaces with underscore.
        //$PageTitle = preg_replace('/[^A-Za-z0-9\_]/', '', $PageTitle); // Removes special chars.
        $title = preg_replace('/[^A-Za-z0-9_]/', '', $title); // Removes special chars includ _.
        $title = preg_replace('/_+/', '_', $title); // Replaces multiple underscore with single one.
        $title = strtolower($title);

        $inputs = [

            'title'            => $title,
            'content'          => $content,
            'link'             => $link
            
            
        ];

        $rules = [

            'title'          => 'required|max:50',
            'content'        => 'required',
            'link'           => 'required'   
        ];

        $messages = [

            'title.required'           => 'Please Enter Title.',
            'content.required'         => 'Please Enter Content.',
            'link.required'            => 'Please Select Link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Welcome Content Image  


        if($contentImage){
            

            $destinationPath    ='aboutus_featuredImage'; // upload path folder should be in public folder
            $thumb704X250       ='aboutus_featuredImage/thumb704X250'; // upload 128*128
            $thumb64X64         ='aboutus_featuredImage/thumb64X64'; // upload 128*128
            $thumb100X100       ='aboutus_featuredImage/thumb100X100';
            $thumb700X300       ='aboutus_featuredImage/thumb700X300';

            $extension      = $contentImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $contentImage->getClientOriginalName();
            $size           = $contentImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($contentImage,array(
                    'width' => 704,
                    'height' => 250,
                    'crop' => true
                ))->save($thumb704X250.'/'.$fileName1);

                 Image::make($contentImage,array(
                    'width' => 64,
                    'height' => 64,
                    'crop' => true
                ))->save($thumb64X64.'/'.$fileName1);

                 Image::make($contentImage,array(
                    'width' => 100,
                    'height' => 100,
                    'crop' => true
                ))->save($thumb100X100.'/'.$fileName1);

                  Image::make($contentImage,array(
                    'width' => 700,
                    'height' => 300,
                    'crop' => true
                ))->save($thumb700X300.'/'.$fileName1);
               
                //save original
                Image::make($contentImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldcontentImage;
        }


           //  $count= DB::table('aboutus_featuredcontent')->select('*')->count();
           //  if($count){
           //  //update
           //  $welcome_content_id= DB::table('aboutus_featuredcontent')->select('id')->get();
           //  DB::table('aboutus_featuredcontent')->where('id', $welcome_content_id[0]->id)->update([
           //  'heading'=>$title,
           //  'content'=>$content,
           //  'image'=>$fileName1,
           //  'link'=>$link

           //  ]);
           //  } else {
           // DB::statement('call aboutUs_FeaturedContent("'.$title.'", "'.$content.'", "'.$fileName1.'", "'.$link.'")');
           //  }           


        DB::table('aboutus_featuredcontent')
        ->where('id', $id)
        ->update([

            'heading'             => $title,
            'content'             => $content,
            'image'               => $fileName1,
            'link'                => $link
        ]); 

        return redirect()->back()->with('message', 'Saved Featured Content.');

    }

    public function saveOurAchievement(Request $req){
       
        $title                = addslashes($req->title);
        $achievementImage     = $req->file('achievementImage');
        $achievement_date     = $req->achievement_date;
        $link                 = $req->link;
       

        $inputs = [

            'title'            => $title,
            'achievement_date' => $achievement_date,
            'achievementImage' => $achievementImage,
            'link'             => $link
            
            
        ];

        $rules = [

            'title'             => 'required|max:50',
            'achievement_date'  => 'required',
            'achievementImage'  => 'required',
            'link'              => 'required'   
        ];

        $messages = [

            'title.required'             => 'Please Enter Title.',
            'achievement_date.required'  => 'Please Select Achievement Date.',
            'achievementImage.required'  => 'Please Upload Image.',
            'link.required'              => 'Please Select Link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Welcome Content Image  


        if($achievementImage){
            

            $destinationPath    ='ourAchievementImage'; // upload path folder should be in public folder
            $thumb555X496       ='ourAchievementImage/thumb555X496'; // upload 128*128
            $thumb262X234       ='ourAchievementImage/thumb262X234'; // upload 128*128

            $extension      = $achievementImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $achievementImage->getClientOriginalName();
            $size           = $achievementImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($achievementImage,array(
                    'width'  => 555,
                    'height' => 496,
                    'crop'   => true
                ))->save($thumb555X496.'/'.$fileName1);

                Image::make($achievementImage,array(
                    'width'   => 262,
                    'height'  => 243,
                    'crop'    => true
                ))->save($thumb262X234.'/'.$fileName1);

               
                //save original
                Image::make($achievementImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }


           
           DB::statement('call add_OurAchievement("'.$title.'", "'.$fileName1.'", "'.$achievement_date.'", "'.$link.'")');
                      

        return redirect()->back()->with('message', 'Saved Our Achievement.');

    }

    public function all_ourAchievement(){

        $OurAchievement=DB::select('call getOurAchievement()');
        $data = array('pagetitle'=>'All Our Achievement');
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        return view('admin.aboutUs.all_our_achievement', $data)->with('OurAchievement',$OurAchievement)->with('admin_profile',$admin_profile);
        
    }

    public function updateOurAchievement(Request $req){
       
        $id                   = $req->id;
        $title                = addslashes($req->title);
        $achievementImage     = $req->file('achievementImage');
        $oldachievementImage  = $req->oldachievementImage;
        $achievement_date     = $req->achievement_date;
        $link                 = $req->link;
       

        $inputs = [

            'title'            => $title,
            'achievement_date' => $achievement_date,
            'link'             => $link
            
            
        ];

        $rules = [

            'title'             => 'required|max:50',
            'achievement_date'  => 'required',
            'link'              => 'required'   
        ];

        $messages = [

            'title.required'             => 'Please Enter Title.',
            'achievement_date.required'  => 'Please Select Achievement Date.',
            'link.required'              => 'Please Select Link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Welcome Content Image  


        if($achievementImage){
            

            $destinationPath    ='ourAchievementImage'; // upload path folder should be in public folder
            $thumb555X496       ='ourAchievementImage/thumb555X496'; // upload 128*128
            $thumb262X234       ='ourAchievementImage/thumb262X234'; // upload 128*128

            $extension      = $achievementImage->getClientOriginalExtension(); // getting image extension
            $originalName   = $achievementImage->getClientOriginalName();
            $size           = $achievementImage->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($achievementImage,array(
                    'width' => 555,
                    'height' => 496,
                    'crop' => true
                ))->save($thumb555X496.'/'.$fileName1);

                Image::make($achievementImage,array(
                    'width' => 262,
                    'height' => 243,
                    'crop' => true
                ))->save($thumb262X234.'/'.$fileName1);

               
                //save original
                Image::make($achievementImage)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldachievementImage;
        }


           
           DB::statement('call updateOurAchievement("'.$id.'", "'.$title.'", "'.$fileName1.'", "'.$achievement_date.'", "'.$link.'")');
                      

        return redirect()->back()->with('message', 'Our Achievement Updated.');

    }

    public function deleteOurAchievement($id){

        $Achievementdelete=DB::statement('call deleteOurAchievement("'.$id.'")');
        return redirect()->back()->with('message', 'One Record Deleted.');


    }

    public function saveOurTeam(Request $req){
       
        $name                = addslashes($req->name);
        $designation         = addslashes($req->designation);
        $content             = addslashes($req->content);
        $image               = $req->file('image');
       
       

        $inputs = [

            'name'            => $name,
            'designation'     => $designation,
            'content'         => $content,
            'image'           => $image
            
            
        ];

        $rules = [

            'name'             => 'required|max:50',
            'designation'      => 'required|max:50',
            'content'          => 'required',
            'image'            => 'required'   
        ];

        $messages = [

            'name.required'             => 'Please Enter Name.',
            'designation.required'      => 'Please Enter Designation.',
            'content.required'          => 'Please Enter Content.',
            'image.required'            => 'Please Upload Image.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Team Image  


        if($image){
            

            $destinationPath    ='ourTeamImage'; // upload path folder should be in public folder
            $thumb360X407       ='ourTeamImage/thumb360X407'; // upload 128*128
            

            $extension      = $image->getClientOriginalExtension(); // getting image extension
            $originalName   = $image->getClientOriginalName();
            $size           = $image->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($image,array(
                    'width' => 360,
                    'height' => 407,
                    'crop' => true
                ))->save($thumb360X407.'/'.$fileName1);

               
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }


           
           DB::statement('call addOurTeam("'.$name.'", "'.$designation.'", "'.$content.'", "'.$fileName1.'")');
                      

        return redirect()->back()->with('message', 'Saved Our Team.');

    }

    public function all_ourTeam(){

        $OurTeam=DB::select('call getOurTeam()');
        $data = array('pagetitle'=>'All Our Team');
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        return view('admin.aboutUs.all_our_team', $data)->with('OurTeam',$OurTeam)->with('admin_profile',$admin_profile);
        
    }

    public function updateOurTeam(Request $req){
       
        $name                = addslashes($req->name);
        $designation         = addslashes($req->designation);
        $content             = addslashes($req->content);
        $image               = $req->file('image');
        $id                  = $req->id;
        $oldimage            = $req->oldimage;
       
       

        $inputs = [

            'name'            => $name,
            'designation'     => $designation,
            'content'         => $content
            
            
            
        ];

        $rules = [

            'name'             => 'required|max:50',
            'designation'      => 'required|max:50',
            'content'          => 'required'
            
        ];

        $messages = [

            'name.required'             => 'Please Enter Name.',
            'designation.required'      => 'Please Enter Designation.',
            'content.required'          => 'Please Enter Content.'
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Team Image  


        if($image){
            

            $destinationPath    ='ourTeamImage'; // upload path folder should be in public folder
            $thumb360X407       ='ourTeamImage/thumb360X407'; // upload 128*128
            

            $extension      = $image->getClientOriginalExtension(); // getting image extension
            $originalName   = $image->getClientOriginalName();
            $size           = $image->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($image,array(
                    'width' => 360,
                    'height' => 407,
                    'crop' => true
                ))->save($thumb360X407.'/'.$fileName1);

               
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldimage;
        }


           
           DB::statement('call updateOurTeam("'.$id.'", "'.$name.'", "'.$designation.'", "'.$content.'", "'.$fileName1.'")');
                      

        return redirect()->back()->with('message', 'Our Team Updated.');

    }

    public function deleteOurTeam($id){

        $Teamdelete=DB::statement('call deleteOurTeam("'.$id.'")');
        return redirect()->back()->with('message', 'One Record Deleted.');


    }


    public function saveAboutusTimeline(Request $req){
       
        $heading             = addslashes($req->heading);
        $content             = addslashes($req->content);
        $date                = $req->date;
        $image               = $req->file('image');
       
       

        $inputs = [

            'heading'         => $heading,
            'content'         => $content,
            'date'            => $date,
            'image'           => $image
            
            
        ];

        $rules = [

            'heading'          => 'required|max:50|unique:aboutus_timeline,heading',
            'content'          => 'required',
            'date'             => 'required',
            'image'            => 'required'   
        ];

        $messages = [

            'heading.required'             => 'Please Enter Heading.',
            'heading.unique'               => 'Timeline Heading already exist.',
            'content.required'             => 'Please Enter Content.',
            'date.required'                => 'Please Select Date',
            'image.required'               => 'Please Upload Image.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Timeline Image  


        if($image){
            

            $destinationPath    ='aboutusTimelineImage'; // upload path folder should be in public folder
            $thumb458X317       ='aboutusTimelineImage/thumb458X317'; // upload 128*128
            $thumb700X517       ='aboutusTimelineImage/thumb700X517'; // upload 128*128
            

            $extension      = $image->getClientOriginalExtension(); // getting image extension
            $originalName   = $image->getClientOriginalName();
            $size           = $image->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($image,array(
                    'width'  => 458,
                    'height' => 317,
                    'crop'   => true
                ))->save($thumb458X317.'/'.$fileName1);

                Image::make($image,array(
                    'width'  => 700,
                    'height' => 517,
                    'crop'   => true
                ))->save($thumb700X517.'/'.$fileName1);

               
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }


           
           DB::statement('call add_aboutusTimelineContent("'.$heading.'", "'.$content.'", "'.$date.'", "'.$fileName1.'")');
                      

        return redirect()->back()->with('message', 'Saved Timeline Content.');

    }

    public function allAboutus_timeline_content(){

        $aboutusTimeline=DB::select('call getAllAboutusTimeline()');
        $data = array('pagetitle'=>'All Timeline Content');
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        return view('admin.aboutUs.all_timeline_content', $data)->with('aboutusTimeline',$aboutusTimeline)->with('admin_profile',$admin_profile);
        
    }

    public function updateAboutusTimeline(Request $req){
       
        $heading                = addslashes($req->heading);
        $content             = addslashes($req->content);
        $image               = $req->file('image');
        $id                  = $req->id;
        $oldimage            = $req->oldimage;
        $date                = $req->date;
        $oldheading            = $req->oldheading;
       
       

        $inputs = [

            'heading'         => $heading,
            'date'            => $date,
            'content'         => $content
            
            
            
        ];

        $rules = [

            'heading'             => 'required|max:50',
            'date'                => 'required',
            'content'             => 'required'
            
        ];

        $messages = [

            'heading.required'          => 'Please Enter Heading.',
            'date.required'             => 'Please Select date.',
            'content.required'          => 'Please Enter Content.'
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        if($heading != $oldheading){

            $ExistHeading = DB::table('aboutus_timeline')->where('heading', '=', $heading)->count();
            if($ExistHeading == 1){
                return redirect()->back()->withInput()->with('singleerror', 'Timeline Heading Allready Exits.' );
            }
        }

        
        // Timeline Image  


        if($image){
            

            $destinationPath    ='aboutusTimelineImage'; // upload path folder should be in public folder
            $thumb458X317       ='aboutusTimelineImage/thumb458X317'; // upload 128*128
            $thumb700X517       ='aboutusTimelineImage/thumb700X517'; // upload 128*128
            

            $extension      = $image->getClientOriginalExtension(); // getting image extension
            $originalName   = $image->getClientOriginalName();
            $size           = $image->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($image,array(
                    'width'  => 458,
                    'height' => 317,
                    'crop'   => true
                ))->save($thumb458X317.'/'.$fileName1);

                Image::make($image,array(
                    'width'  => 700,
                    'height' => 517,
                    'crop'   => true
                ))->save($thumb700X517.'/'.$fileName1);

               
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldimage;
        }


           
           DB::statement('call updateAboutusTimelineContent("'.$id.'", "'.$heading.'", "'.$content.'", "'.$date.'", "'.$fileName1.'")');
                      

        return redirect()->back()->with('message', 'Timeline Content Updated.');

    }

    public function deleteAboutustimeline($id){

        $TimelineContent=DB::statement('call deleteAboutusTimeline("'.$id.'")');
        return redirect()->back()->with('message', 'One Record Deleted.');


    }

    public function saveAboutusAccordion(Request $req){
       
        $heading             = addslashes($req->heading);
        $content             = addslashes($req->content);
       
       

        $inputs = [

            'heading'         => $heading,
            'content'         => $content
           
            
            
        ];

        $rules = [

            'heading'          => 'required|max:50|unique:aboutus_accordion,heading',
            'content'          => 'required'
        
        ];

        $messages = [

            'heading.required'             => 'Please Enter Heading.',
            'heading.unique'               => 'Accordion Heading already exist.',
            'content.required'             => 'Please Enter Content.'
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }


           DB::statement('call addAboutusAccordion("'.$heading.'", "'.$content.'")');
                      

        return redirect()->back()->with('message', 'Saved Accordion.');

    }

    public function all_aboutus_accordion(){

        $aboutusAccordion=DB::select('call getAboutusAccordion()');
        $data = array('pagetitle'=>'All Accordion');
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        return view('admin.aboutUs.all_accordion', $data)->with('aboutusAccordion',$aboutusAccordion)->with('admin_profile',$admin_profile);
        
    }

    public function updateAboutusAccordion(Request $req){
       
        $heading             = addslashes($req->heading);
        $content             = addslashes($req->content);
        $id                  = $req->id;
        $oldheading          = $req->oldheading;
       
       

        $inputs = [

            'heading'         => $heading,
            'content'         => $content
            
            
            
        ];

        $rules = [

            'heading'             => 'required|max:50',
            'content'             => 'required'
            
        ];

        $messages = [

            'heading.required'          => 'Please Enter Heading.',
            'content.required'          => 'Please Enter Content.'
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        if($heading != $oldheading){

            $ExistHeading = DB::table('aboutus_accordion')->where('heading', '=', $heading)->count();
            if($ExistHeading == 1){
                return redirect()->back()->withInput()->with('singleerror', 'Accordion Heading Allready Exits.' );
            }
        }

           
           DB::statement('call updateAboutusAccordion("'.$id.'", "'.$heading.'", "'.$content.'")');
                      

        return redirect()->back()->with('message', 'Accordion Updated.');

    }

    public function deleteAboutusAccordion($id){

        $aboutusAccordion=DB::statement('call deleteAboutusAccordion("'.$id.'")');
        return redirect()->back()->with('message', 'One Record Deleted.');


    }

    public function saveAboutusTab(Request $req){
       
        $heading             = addslashes($req->heading);
        $content             = addslashes($req->content);
        $image               = $req->file('image');
       
       

        $inputs = [

            'heading'         => $heading,
            'content'         => $content,
            'image'           => $image
            
            
        ];

        $rules = [

            'heading'          => 'required|max:50|unique:aboutus_tab,heading',
            'content'          => 'required',
            'image'            => 'required'   
        ];

        $messages = [

            'heading.required'          => 'Please Enter Heading.',
            'heading.unique'            => 'Tab Heading already exist.',
            'content.required'          => 'Please Enter Content.',
            'image.required'            => 'Please Upload Image.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Team Image  


        if($image){
            

            $destinationPath    ='AboutusTabsImage'; // upload path folder should be in public folder
            $thumb165X165       ='AboutusTabsImage/thumb165X165'; // upload 128*128
            

            $extension      = $image->getClientOriginalExtension(); // getting image extension
            $originalName   = $image->getClientOriginalName();
            $size           = $image->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($image,array(
                    'width'  => 165,
                    'height' => 165,
                    'crop'   => true
                ))->save($thumb165X165.'/'.$fileName1);

               
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = '';
        }



            $count = DB::table('aboutus_tab')->count();
            if($count >= 3){
                return redirect()->back()->withInput()->with('singleerror', ' You are Add 3 Tab Only.' );
            }
       

           
           DB::statement('call addAboutusTab("'.$heading.'", "'.$content.'", "'.$fileName1.'")');
                      

        return redirect()->back()->with('message', 'Saved Tab.');

    }

    public function all_aboutus_tabs(){

        $aboutusTab=DB::select('call getAboutusTabs()');
        $data = array('pagetitle'=>'All Tabs');
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        return view('admin.aboutUs.all_tabs', $data)->with('aboutusTab',$aboutusTab)->with('admin_profile',$admin_profile);
        
    }


    public function updateAboutusTab(Request $req){
       
        $heading             = addslashes($req->heading);
        $content             = addslashes($req->content);
        $image               = $req->file('image');
        $id                  = $req->id;
        $oldimage            = $req->oldimage;
        $oldheading          = $req->oldheading;
       
       

        $inputs = [

            'heading'         => $heading,
            'content'         => $content
            
            
            
        ];

        $rules = [

            'heading'             => 'required|max:50',
            'content'             => 'required'
            
        ];

        $messages = [

            'heading.required'          => 'Please Enter Heading.',
            'content.required'          => 'Please Enter Content.'
           
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        if($heading != $oldheading){

            $ExistHeading = DB::table('aboutus_tab')->where('heading', '=', $heading)->count();
            if($ExistHeading == 1){
                return redirect()->back()->withInput()->with('singleerror', 'Tab Heading Allready Exits.' );
            }
        }

        
        // tab Image  


        if($image){
            

            $destinationPath    ='AboutusTabsImage'; // upload path folder should be in public folder
            $thumb165X165       ='AboutusTabsImage/thumb165X165'; // upload 128*128
            

            $extension      = $image->getClientOriginalExtension(); // getting image extension
            $originalName   = $image->getClientOriginalName();
            $size           = $image->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($image,array(
                    'width'  => 165,
                    'height' => 165,
                    'crop'   => true
                ))->save($thumb165X165.'/'.$fileName1);

               
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldimage;
        }


           
           DB::statement('call updateAboutusTabs("'.$id.'", "'.$heading.'", "'.$content.'", "'.$fileName1.'")');
                      

        return redirect()->back()->with('message', 'Tab Updated.');

    }

    public function deleteAboutusTabs($id){

        $AboutusTab=DB::statement('call deleteAboutusTabs("'.$id.'")');
        return redirect()->back()->with('message', 'One Record Deleted.');


    }

    public function saveAdminProfile(Request $req){
       
        $name                = addslashes($req->name);
        $designation         = addslashes($req->designation);
        // $email_id            = $req->email_id;
        $date                = $req->date;
        $image               = $req->file('image');
        $oldimage            = $req->oldimage;
       
        $inputs = [

            'name'            => $name,
            'designation'     => $designation,
            // 'email_id'        => $email_id,
            'date'            => $date
            
            
        ];

        $rules = [

            'name'          => 'required|max:50',
            'designation'   => 'required',
            // 'email_id'      => 'required',
            'date'          => 'required'   
        ];

        $messages = [

            'name.required'           => 'Please Enter Name.',
            'designation.required'    => 'Please Enter Designation.',
            // 'email_id.required'       => 'Please Enter Email Id.',
            'date.required'           => 'Please Select Date.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        
        // Welcome Content Image  


        if($image){
            

            $destinationPath    ='adminProfileImage'; // upload path folder should be in public folder
            $thumb160X160       ='adminProfileImage/thumb160X160'; // upload 128*128

            $extension      = $image->getClientOriginalExtension(); // getting image extension
            $originalName   = $image->getClientOriginalName();
            $size           = $image->getSize();
            $fileName1      = time().$originalName; // renameing image

            // condition to check type of file and size of file..
            if((($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='JPEG') || ($extension=='JPG') || ($extension=='PNG'))&&($size<5000000)){


                Image::make($image,array(
                    'width'  => 160,
                    'height' => 160,
                    'crop'   => true
                ))->save($thumb160X160.'/'.$fileName1);

               
                //save original
                Image::make($image)->save($destinationPath.'/'.$fileName1);


                
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Only maximum 5MB jpg or png image is allowed.' );
            }
        } else {
            $fileName1 = $oldimage;
        }


            $count= DB::table('admin_profile')->select('*')->count();
            if($count > 0){
            //update
            $admin_profile_id= DB::table('admin_profile')->select('id')->get();
            DB::table('admin_profile')->where('id', $admin_profile_id[0]->id)->update([
            'name'          =>$name,
            'designation'   =>$designation,
            // 'email_id'      =>$email_id,
            'date'          =>$date,
            'image'         =>$fileName1
            

            ]);
            } else {
           DB::statement('call adminProfile("'.$name.'", "'.$designation.'","'.$date.'", "'.$fileName1.'")');
           // DB::statement('call adminProfile("'.$name.'", "'.$designation.'", "'.$email_id.'", "'.$date.'", "'.$fileName1.'")');
            }            

        return redirect()->back()->with('message', 'Saved Admin Profile.');

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
