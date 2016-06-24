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

    public function about_Content(Request $req){

        $id                   = $req->id;
        $title                = $req->title;
        $content              = $req->content;
        // $contentImage         = $req->file('contentImage');
        // $oldcontentImage      = $req->oldcontentImage;
        // $link                 = $req->link;
       


      
     

        $inputs = [

            'title'            => $title,
            'content'          => $content
            // 'link'             => $link
            
            
        ];

        $rules = [

            'title'          => 'required|max:100',
            'content'        => 'required'
            // 'link'           => 'required'   
        ];

        $messages = [

            'title.required'           => 'Please Enter Title.',
            'content.required'         => 'Please Enter Content.'
            // 'link.required'            => 'Please Select Link.'
        ];

        $validation = Validator::make($inputs, $rules, $messages);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

                
        DB::table('about_us')
        ->where('id', $id)
        ->update([

            'title'             => $title,
            'content'             => $content
            // 'image'               => $fileName1,
            // 'link'                => $link
        ]); 

        return redirect()->back()->with('message', 'Saved Content.');

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

         DB::table('aboutus_our_team')
            ->insert([
             // 'id'                => $id,
            'name'              => $name,
            'designation'           => $designation,
            'content'             => $content,
            'image'            => $fileName1

                    
            ]);

           return redirect()->back()->with('message', 'SAVED.');
           
           

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



         DB::table('aboutus_our_team')
            ->where('id', $id)
            ->update([
             // 'id'                => $id,
            'name'              => $name,
            'designation'           => $designation,
            'content'             => $content,
            'image'            => $fileName1

                    
            ]);

           return redirect()->back()->with('message', 'updated.');
           
          

    }



     public function deleteOurTeam($id){

                DB::table('aboutus_our_team')->where('id', $id)->delete([

                      'id'   => $id,
                ]);

        return redirect()->back()->with('message', ' deleted');

     


      }

   

    

   
}
